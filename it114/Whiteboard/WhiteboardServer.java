import java.io.*;
import java.net.*;
import java.util.*;

public class WhiteboardServer{
	public static void main(String[] args){
	  try{
		ArrayList<WhiteboardSession> sessions = new ArrayList<WhiteboardSession>();
		log("Initializing at IP: " + Inet4Address.getLocalHost().getHostAddress());
		ServerSocket ss = new ServerSocket(2146);
        
		if(args.length == 0){
			log("CONFIG FLAG -> Resume last whiteboard state: FALSE");
			log("CONFIG FLAG -> To resume state, use <java WhiteboardServer resume>");
			try {
            	ObjectOutputStream writeLines = new ObjectOutputStream(new FileOutputStream("whiteboard.txt"));
                   	writeLines.writeObject(new ArrayList<Line>());
                   	writeLines.close();
           	} catch (IOException e){}
        } else if(args[0].equals("resume")){
        	log("CONFIG FLAG -> Maintain whiteboard state: TRUE");
        } else {
        	log("CONFIG FLAG -> Invalid arguement, Assuming last state. Next time, use <java WhiteboardServer resume>");
        }

        int currentSessionNumber = 1;
		for(;;){
			log("Waiting for connection");
			Socket s = ss.accept();
			log("Connection Made");
			new WhiteboardSession(s, sessions, currentSessionNumber++).start();
			log("New Thread Spawned");
		}
	  }catch(Exception e){
	  	e.printStackTrace();
	  	System.out.println("Socket Error.");
	  }
	}
	public static void log(String message){
		String source = "SERVER HOST: ";
		System.out.println(source + message);
	}
}

class WhiteboardSession extends Thread{
	public WhiteboardSession(Socket s, ArrayList<WhiteboardSession> sessions, int sessionNumber){
		this.s = s;
		this.sessions = sessions;
		this.sessions.add(this);
		this.sessionNumber = sessionNumber;
	}
	public void run(){
		try {
			
			//Initialize Connection to Client
			log("Initializing Socket Streams");

			log("--Initializing Input Stream");
			ois = new ObjectInputStream(s.getInputStream());
			log("--Initialed Input Stream");

			log("--Initializing Output Stream");
  		 	oos = new ObjectOutputStream(s.getOutputStream());
			log("--Initialized Output Stream");

			log("Initializing File Stream");
		    ObjectInputStream readFile = new ObjectInputStream(new FileInputStream("whiteboard.txt"));
			log("Initialized File Stream");

			log("Reading Archive File into Memory");
			Lines temp = new Lines();
			temp.setArray((ArrayList<Line>)readFile.readObject());

	        log("Archive file read into Memory");
            log("Storing Archive file");
			archive = new DataObject(temp.getArray());

			readFile.close();

			//Send Archive
			log("Sending Archive");
		 	sender(archive);
			log("Archive Sent");

			//Receive Name
			DataObject packet = (DataObject)ois.readObject();
			name = packet.getMessage();
			
			//Send Entry Message
			packet.setMessage(name + " has entered chat.\n");
			broadcaster(packet);
			
			packet.setMessage("You have entered chat.\n");
			sender(packet);
			updateUserList();
			
		 	for(;;){
				log("Waiting for packet from client");
				receiver((DataObject)ois.readObject());
			}

		} catch(Exception e){
			try {
				log("Sending leave message");
				DataObject packet = new DataObject(name + " has exited chat.\n");
				broadcaster(packet);
				log("Sent leave message");
				this.sessions.remove(this);
				updateUserList();
		 		ois.close();
		 		oos.close();
		 		s.close();
			} catch (IOException ie){
					e.printStackTrace();
			}
			//e.printStackTrace();
			log("Client shutdown, thread ending");
		}
	}

	public void clearArchive(){
		log("Clearing Archive");
        try {
         	ObjectOutputStream writeLines = new ObjectOutputStream(new FileOutputStream("whiteboard.txt"));
            writeLines.writeObject(new ArrayList<Line>());
            writeLines.close();
			log("Archive Cleared");
        } catch (IOException e){
        	log("Clear Archive Fail");
        }
	}

	public void receiver(DataObject packet){
		log("Parsing packet");
		try {
			switch(packet.getPayload()) {
				case 0: break;
				case 1: log("Clear packet received");
						broadcaster(packet); //Send clear packet out
						clearArchive();
						break;
				case 2: break;
				case 3: updateArchive(packet);
						break;
				case 4: log("Chat message received");
						broadcaster(packet);
						break;
				case 5: log("User List received");
						break;
				default: break;
			}
		} catch (IOException e){
			System.out.println("Receiver error:");
			e.printStackTrace();
        }
   }

	public void updateUserList(){
		userList = new String[sessions.size()];
		
		int index = 0;
		for(WhiteboardSession session:sessions){
			userList[index] = session.name;
			index++;
		}
		DataObject packet = new DataObject(userList);
		
		for(WhiteboardSession session:sessions){
			session.sender(packet);
		}		
    }
   
	public synchronized void broadcaster(DataObject packet) throws IOException {
		log("Broadcasting packet to all clients");
		for(WhiteboardSession session:sessions){
			if(session != this){
				log("Sending to session: " + session.sessionNumber);
				session.sender(packet);
			}
		}
	}

	public void sender(DataObject packet){
		log("Preparing to send packet.");
		try {
			log("Sending Packet");
			oos.writeObject(packet);
			log("Packet Sent");
		} catch(IOException e){
			log("Packet send fail.");
		}
	}

	public void updateArchive(DataObject packet){
		ArrayList<Line> temp = new ArrayList<Line>();
		temp = archive.getLines();
		temp.add(packet.getLine());
		try {
			broadcaster(packet); //Send line to clients.
		} catch (Exception e){e.printStackTrace();}
		archive.setLines(temp);
		try {
			ObjectOutputStream writeLines = new ObjectOutputStream(new FileOutputStream("whiteboard.txt"));
			writeLines.writeObject(archive.getLines());
	        writeLines.close();
		} catch (IOException e){}

	}
	public void log(String message){
		if(debug){
			String source = "THREAD <" + sessionNumber + ">: ";
			System.out.println(source + message);
		}
	}

	String name;
	static boolean debug = false;
	int sessionNumber;
	ObjectInputStream ois;
	ObjectOutputStream oos;
	DataObject archive;
	Socket s;
	String[] userList;
	ArrayList<WhiteboardSession> sessions;
}

