import java.io.*;
import java.net.*;
import java.util.*;

public class ThreadedChatServer{

	public static void main(String[] args){
	  try{

		ArrayList<ThreadedChatHandler> handlers = new ArrayList<ThreadedChatHandler>();
		ServerSocket ss = new ServerSocket(1999);

		for(;;){
			Socket s = ss.accept();
			new ThreadedChatHandler(s, handlers).start();
		}
		
		

	  }catch(Exception e){

		System.out.println(e.getMessage());
	  }
	}
}
class ThreadedChatHandler extends Thread{

	public ThreadedChatHandler(Socket s, ArrayList<ThreadedChatHandler> list){

		this.s = s;
		this.list = list;
		this.list.add(this);
	}

	public synchronized void broadcast(DataObject d) throws IOException{

		for(ThreadedChatHandler handler: list){
			
			handler.oos.writeObject(d);
		}

	}

	public void run(){
		try{
		  ois = new ObjectInputStream(s.getInputStream());

  		  oos = new ObjectOutputStream(s.getOutputStream());
	
		  while(true){

		  	obj = (DataObject)ois.readObject();

		  	broadcast(obj);
		  }

		 
 		}catch(Exception e){
			System.out.println(e.getMessage());
		}finally{
			try{
				list.remove(this);
				ois.close();
		  		oos.close();
		  		s.close();
			}catch(IOException ioe){
				System.out.println(ioe.getMessage());
			}

		}

	}
	DataObject obj;
	Socket s;
	ArrayList<ThreadedChatHandler> list;
	ObjectInputStream ois;
	ObjectOutputStream oos;
}