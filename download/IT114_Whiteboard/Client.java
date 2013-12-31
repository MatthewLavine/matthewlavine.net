import java.awt.*;
import java.awt.event.*;
import java.applet.*;
import java.util.ArrayList;
import java.io.*;
import java.net.*;
import javax.swing.JOptionPane;

class Lines implements Serializable {

	ArrayList<Line> lines = new ArrayList<Line>();

	public void setArray(ArrayList<Line> lines){
		this.lines = lines;
	}

	public ArrayList<Line> getArray(){
		return lines;
	}
}

class Line implements Serializable{
	public Line(int sX, int sY, int eX, int eY, Color c){
		setStartX(sX);
		setStartY(sY);
		setEndX(eX);
		setEndY(eY);
		setColor(c);
	}
	private int startX;
	private int startY;
	private int endX;
	private int endY;
	private Color color;

	public void setStartX(int n){
		startX = n;
	}
	public void setStartY(int n){
		startY = n;
	}
	public void setEndX(int n){
		endX = n;
	}
	public void setEndY(int n){
		endY = n;
	}
	public void setColor(Color c){
		color = c;
	}
	public int getStartX(){return startX;}
	public int getStartY(){return startY;}
	public int getEndX(){return endX;}
	public int getEndY(){return endY;}
	public Color getColor(){return color;}
}


public class Client extends Frame implements MouseListener, MouseMotionListener, ActionListener{
	static boolean debug = false;
	Panel messenger;
	Button send;
	TextField tf;
	TextArea ta;
	TextArea userListArea;
	String name;
	Panel content;
	ObjectOutputStream oos;
	ObjectInputStream ois;
	int lastX;
	int lastY;
	int currX;
	int currY;
	Color color;
	Button bR;
	Button bG;
	Button bB;
	Button bBlack;
	Button clear;
	Panel colors;
	boolean isBackspace = false;
	boolean didEnter = false;
	boolean archiveRecieved = false;
	boolean firstRun = true;
	boolean clearScreen = false;
	boolean clearScreenFromServer = false;
	boolean addLineFromServer = false;
	boolean dragged = false;
	ArrayList<Line> lines = new ArrayList<Line>();

	public Client(String name, String ip){
		this.name = name;
		setTitle("NJIT Messageboard - " + name);
		setSize(1000,800);
		addWindowListener(new WindowAdapter(){
			public void windowClosing(WindowEvent we){
				log("Client Shutting Down");
				System.exit(0);
			}
		});

		//Whiteboard Init
		setLayout(new BorderLayout());

		colors = new Panel();
		colors.setLayout(new GridLayout(5,1));

		bR = new Button("Red");
		bR.addActionListener(this);

		bG = new Button("Green");
		bG.addActionListener(this);

		bB = new Button("Blue");
		bB.addActionListener(this);

		bBlack = new Button("Black");
		bBlack.addActionListener(this);

		clear = new Button("Clear");
		clear.addActionListener(this);

		colors.add(bR);
		colors.add(bG);
		colors.add(bB);
		colors.add(bBlack);
		colors.add(clear);
		
		
		addMouseMotionListener(this);
		addMouseListener(this);
		
		//Chat Init
		messenger = new Panel();
		messenger.setLayout(new BorderLayout());
		send = new Button("Send");
		send.addActionListener(this);
		//messenger.add(send, BorderLayout.SOUTH);
		tf = new TextField();
		messenger.add(tf,BorderLayout.NORTH);
		ta = new TextArea(1,40);
		ta.setEditable(false);
		messenger.add(ta, BorderLayout.CENTER);
		userListArea = new TextArea(1,10);
		userListArea.setEditable(false);
		messenger.add(userListArea, BorderLayout.EAST);
		
		
		tf.addActionListener(this);
		
		//Add all to window
		add(messenger, BorderLayout.EAST);
		add(colors, BorderLayout.WEST);

		for(int i = 1; i <= 4; i++){
			try{
				//Initialize Connection to Server
				log("Attempt Connection");
				Socket s = new Socket(ip, 2146);
				i = 1;
				log("Connection Made");
			
				log("Initialize Streams.");
			
				log("--Initializing Output Stream.");
				oos = new ObjectOutputStream(s.getOutputStream());
				log("--Initialized Output Stream.");
			
				log("--Initializing Input Stream.");
				ois = new ObjectInputStream(s.getInputStream());
				log("--Initialized Input Stream.");
			
				log("Initialized Streams");
				
				//Receive and draw initial line archive packet
				log("Wait for Archive Receipt");
				DataObject archive = (DataObject)ois.readObject();
			
				log("Archive Received");
				lines = archive.getLines();

				//Send Name
				DataObject initpacket = new DataObject(name);
				sender(initpacket);
				
				log("Paint and show window");
				repaint();
				setVisible(true);
				
				//Listen for incoming server comands ad infinum
				for(;;){
					log("Wait for server packet...");
					DataObject packet = (DataObject)ois.readObject();
					parsePacket(packet);
					log("Packet received");
				}

			} catch(Exception e){
				log("Connection to server LOST");
				setVisible(false);
				//e.printStackTrace(); Can be enabled for diagnostic purposes
				if(i==4)
					continue;
				log("Waiting 5 seconds before attempting to reconnect");
				try{Thread.sleep(5000);
				} catch(InterruptedException ie){
					log("Thread Sleep Interrupted");
				}
				log("Attempting to reconnect to server...Attempt " + i);
				
			}
		}
		log("Client Shutting Down");
		System.exit(0);
	}

	public void parsePacket(DataObject packet){
		log("Parsing Packet");

		switch(packet.getPayload()) {
			case 0: log("Bad Packet Received");
					break;

			case 1: log("Clear Packet Received");
					clearScreenFromServer = true;
					repaint();
					break;

			case 2: log("Full redraw Packet Received");
					clearScreenFromServer = true;
					repaint();
					archiveRecieved = true;
					lines = packet.getLines(); 
					repaint();
					break;

			case 3: log("New line Packet Received");
					lines.add(packet.getLine());
					addLineFromServer = true;
					repaint();
					break;
			case 4: log("New message Received");
					ta.append(packet.getMessage());
					break;
			case 5: log("User List Received");
					updateUserList(packet);
					break;
			default: break;
		}
	}

	public void sender(DataObject packet){
		log("Preparing to send packet.");
		try {
			log("Sending Packet");
			oos.writeObject(packet);
			log("Packet Sent");
		} catch(IOException e){log("Packet send fail.");}
	}

	public void updateUserList(DataObject packet){
		String[] userList = packet.getUserList();
		
		userListArea.setText("");
		
		for(int i = 0 ; i < userList.length ; i++){
			userListArea.setText(userListArea.getText() + "\n" + userList[i]);
		}
	}
	
	public void paint(Graphics g){
		log("Paint Called");
		try {
		if(clearScreen || clearScreenFromServer){
			log("Preparing to clear screen.");
			lines = new ArrayList<Line>();
			Dimension d = getSize();
			g.setColor(Color.WHITE);
			g.fillRect(0, 0, d.width, d.height);
			if(clearScreen){
				sender(new DataObject(true));
				log("Clear packet sent to server.");
			}
			clearScreen = false;
			clearScreenFromServer = false;
			log("Screen cleared.");
			return;
		}
		if(!dragged || firstRun /*|| archiveRecieved*/){
			firstRun = false;
			archiveRecieved = false;
			for (Line l : lines){
				g.setColor(l.getColor());
				g.drawLine(l.getStartX(), l.getStartY(), l.getEndX(), l.getEndY());
			}
		}

		g.setColor(color);
		g.drawLine(lastX, lastY, currX, currY);
		Line line = new Line(lastX, lastY, currX, currY, color);
		lines.add(line);
		if(!addLineFromServer)
			sender(new DataObject(line));
		addLineFromServer = false;
		record(currX, currY);
		} catch (Exception e){
			log("CONCURRENT PAINT EXCEPTION");
		}
	}
	public void update(Graphics g){
		paint(g);
	}
	public void record(int x, int y){
		lastX = x;
		lastY = y;
	}
	public void mouseEntered(MouseEvent e){
		record(e.getX(), e.getY());
	}
	public void mouseExited(MouseEvent e){}
	public void mousePressed(MouseEvent e){
		dragged = !dragged;
		record(e.getX(), e.getY());
	}
	public void mouseReleased(MouseEvent e){
		dragged = !dragged;

	}
	public void mouseClicked(MouseEvent e){}
	public void mouseMoved(MouseEvent e){}
	public void mouseDragged(MouseEvent e){
		currX = e.getX();
		currY = e.getY();
		repaint();
	}
	public void actionPerformed(ActionEvent ae){
		//Whiteboard
		if(ae.getSource() == bR){
			color = Color.RED;
			return;
		}
		if(ae.getSource() == bG){
			color = Color.GREEN;
			return;
		}
		if(ae.getSource() == bB){
			color = Color.BLUE;
			return;
		}
		if(ae.getSource() == bBlack){
			color = Color.BLACK;
			return;
		}
		if(ae.getSource() == clear){
			clearScreen = true;
			repaint();
			return;
		}
		
		//Chat
		if((ae.getSource() == send)){
			sendMessage();
		} else {
			sendMessage();
		}
	}
	
	public void sendMessage(){
		if(!(tf.getText().equals(""))){
			log("Send Pressed");
			sender(new DataObject(name +  ": " + tf.getText() + "\n"));
			ta.append(name +  ": " + tf.getText() + "\n");
			tf.setText("");
		}
	}
		
	public static void log(String message){
		if(debug){
			String source = "LOG: ";
			System.out.println(source + message);
		}
	}

	public static void main(String[] args){
		String ip = "localhost";
		String name = "Guest";
		
		if(args.length > 0){
			if(args.length == 1){
				name = args[0];
			} else {
				name = args[0];
				ip = args[1];
			}
		}		
		log("Searching for server at: " + ip);
		log("To specify a server other than localhost use the formula: <java Draw 'name' '192.168.0.1'>");
		Client client = new Client(name, ip);
	}
}

