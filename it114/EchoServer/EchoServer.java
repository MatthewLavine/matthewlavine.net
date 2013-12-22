import java.io.*;
import java.net.*;

public class EchoServer {

   public static void main(String[] args ) {
   try
      {
	 ServerSocket s = new ServerSocket(8189);
	while(true){
         Socket incoming = s.accept( );
         BufferedReader in = new BufferedReader
            (new InputStreamReader(incoming.getInputStream()));
         PrintWriter out = new PrintWriter
            (incoming.getOutputStream(), true /* autoFlush */);


         out.println( "Hello! Enter BYE to exit." );
         System.out.println("---------------------------------");
         System.out.println("SERVER LOG: New Client Connected.");
         System.out.println("---------------------------------");

         boolean done = false;
         while (!done)
         {  String str = in.readLine();
            if (str == null) done = true;
            else
            {  out.println("ECHO: " + str);
		System.out.println("SERVER LOG: " + str);
               if (str.trim().toLowerCase().equals("bye"))
			 done = true;
            }
         }

         System.out.println("-------------------------------");
	 System.out.println("SERVER LOG: Client Disonnected.");
         System.out.println("-------------------------------");
         incoming.close();
	}
      }
      catch (Exception e)
      {  System.out.println(e);
      }
   }
}


