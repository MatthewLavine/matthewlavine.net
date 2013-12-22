import java.io.*;
import java.net.*;

public class ThreadedServer{

	public static void main(String[] args){
	  try{
		ServerSocket ss = new ServerSocket(1999);

		for(;;){
			Socket s = ss.accept();
			new ThreadedHandler(s).start();
		}

	  }catch(Exception e){

		System.out.println(e.getMessage());
	  }
	}
}
class ThreadedHandler extends Thread{

	public ThreadedHandler(Socket s){

		this.s = s;
	}

	public void run(){
		try{
		  ObjectInputStream ois = new ObjectInputStream(s.getInputStream());

  		  ObjectOutputStream oos = new ObjectOutputStream(s.getOutputStream());

		  obj = (DataObject)ois.readObject();

		  obj.setMessage("Got it");

		  oos.writeObject(obj);


		  ois.close();
		  oos.close();
		  s.close();
 		}catch(Exception e){
			System.out.println(e.getMessage());
		}

	}
	DataObject obj;
	Socket s;

}
