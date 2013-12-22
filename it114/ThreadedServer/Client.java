import java.io.*;
import java.net.*;

public class Client{

	public static void main(String[] args){
	  try{

		Socket s = new Socket("128.235.217.177", 1999);

		ObjectOutputStream oos = new ObjectOutputStream(s.getOutputStream());

		ObjectInputStream ois = new ObjectInputStream(s.getInputStream());

		DataObject sendobj = new DataObject("Original message");

		System.out.println("SENT: " + sendobj.getMessage());

		oos.writeObject(sendobj);

		DataObject receiveobj = (DataObject)ois.readObject();

		System.out.println("RECEIVED: " + receiveobj.getMessage());

		ois.close();
		oos.close();
		s.close();



	  }catch(Exception e){

		System.out.println(e.getMessage());
	  }
	}
}
