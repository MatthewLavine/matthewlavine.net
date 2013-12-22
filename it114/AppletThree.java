import java.awt.*;
import java.awt.event.*;
import java.applet.*;

public class AppletThree extends Applet implements ActionListener, TextListener{
	Button b;
	TextField tf;
	TextArea ta;
	boolean isBackspace = false;
	public void init(){
		setLayout(new BorderLayout());
		tf = new TextField();
		add(tf,BorderLayout.NORTH);
		ta = new TextArea();
		add(ta, BorderLayout.CENTER);
		tf.addActionListener(this);
		tf.addTextListener(this);
		tf.addKeyListener(new KeyAdapter(){
			@Override
			public void keyTyped(KeyEvent e){
				if(e.getKeyChar() == KeyEvent.VK_BACK_SPACE){
					isBackspace = !isBackspace;
				}
			}
		});
		b = new Button("Clear");
		add(b,BorderLayout.SOUTH);
		b.addActionListener(this);
	}
	public void actionPerformed(ActionEvent ae){
		if(ae.getSource() == b){
			ta.setText("");
			tf.setText("");
		}
		else{
			//String temp = tf.getText();
			ta.append("\n");
			tf.setText("");
		}
	}
	
	public void textValueChanged(TextEvent te){
		if(isBackspace){
			isBackspace = !isBackspace;
			String t = ta.getText();
			t = t.replaceFirst(".$","");
			ta.setText(t);
			return;
		}
		String temp = tf.getText();
		char c = temp.charAt(temp.length()-1);
		ta.append(""+c);
	}
}
