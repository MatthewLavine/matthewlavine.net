import java.io.*;
import java.net.*;
import java.util.*;

public class DataObject implements Serializable{
	boolean clear;
	ArrayList<Line> lines;
	String[] userList;
	Line line;
	int payload;
	String message;

	//Constructors
	public DataObject(){
		setPayload(0);
	}

	public DataObject(boolean clear){
		setClear(clear);
		setPayload(1);
	}
	public DataObject(ArrayList<Line> lines){
		setLines(lines);
		setPayload(2);
	}
	public DataObject(Line line){
		setLine(line);
		setPayload(3);
	}
	public DataObject(String message){
		setMessage(message);
		setPayload(4);
	}
	public DataObject(String[] userList){
		setUserList(userList);
		setPayload(5);
	}
	//Setters
	public void setClear(boolean clear){
		this.clear = clear;
	}
	public void setLines(ArrayList<Line> lines){
		this.lines = lines;
	}
	public void setLine(Line line){
		this.line = line;
	}
	public void setPayload(int payload){
		this.payload = payload;
	}
	public void setMessage(String message){
		this.message = message;
	}
	public void setUserList(String[] userList){
		this.userList = userList;
	}

	//Getters
	public boolean doClear(){
		return clear;
	}
	public ArrayList<Line> getLines(){
		return lines;
	}
	public Line getLine(){
		return line;
	}
	public int getPayload(){
		return payload;
	}
	public String getMessage(){
		return message;
	}
	public String[] getUserList(){
		return userList;
	}
}
