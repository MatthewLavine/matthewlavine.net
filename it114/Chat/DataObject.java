import java.io.*;
import java.net.*;

public class DataObject implements Serializable{

	String message;

	public DataObject(){}

	public DataObject(String message){

		setMessage(message);
	}


	public void setMessage(String message){

		this.message = message;
	}
	
	public String getMessage(){
		
		return message;
	}
}