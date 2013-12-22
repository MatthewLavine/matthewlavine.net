import java.io.*;
import java.net.*;
import java.util.*;

public class ThreadedChatClient extends Thread{

	Socket s;
	DataObject in, out;
	ObjectOutputStream oos;
	ObjectInputStream ois;
	Scanner scan;

	public ThreadedChatClient(){

		scan = new Scanner(System.in);
		try{
			s = new Socket("localhost", 1999);
			oos = new ObjectOutputStream(s.getOutputStream());
		}catch(Exception e){
			System.out.println(e.getMessage());
		}
		this.start();

		for(;;){

			String temp = scan.nextLine();
			out = new DataObject(temp);
			try{
				oos.writeObject(out);
			}catch(Exception e){
				System.out.println(e.getMessage());
			}

		}

	}
	
	public void run(){
		try{
			ois = new ObjectInputStream(s.getInputStream());
		}catch(Exception e){
			System.out.println(e.getMessage());
		}
		for(;;){
			try{
				in = (DataObject)ois.readObject();

			}catch(Exception e){

				System.out.println(e.getMessage());
			}
			System.out.println(in.getMessage());
		}

	}


	public static void main(String[] args){
	 
		ThreadedChatClient c = new ThreadedChatClient();
		
	}
}