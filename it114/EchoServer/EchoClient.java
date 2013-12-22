import java.io.*;
import java.net.*;


public class EchoClient{

	public static void main(String[] args){
	try{
		BufferedReader kb = new BufferedReader(new InputStreamReader(System.in));


		Socket s = new Socket("localhost",8189);
		PrintWriter out = new PrintWriter(s.getOutputStream(), true /* autoFlush */);
		BufferedReader in = new BufferedReader(new InputStreamReader(s.getInputStream()));

		while(true){
			String fromServer = in.readLine();
			if(fromServer == null) break;
			System.out.println(fromServer);
			String current = kb.readLine();
			if(current.toLowerCase().equals("bye")) break;
			out.println(current);

		}
		s.close();
		System.out.println("Disconnected.");

	}catch(Exception e){

		System.out.println(e.getMessage());
	}
	}
}
