import java.awt.*;
import java.awt.event.*;
import java.applet.*;

public class MyApplet extends Applet implements ActionListener{
	Button r;
	Button l;
	Button u;
	Button d;
	int x = 0;
	int y = 0;
	public void init(){
		r = new Button("Right!");
		l = new Button("Left!");
		u = new Button("Up!");
		d = new Button("Down!");
		add(l);
		add(r);
		add(u);
		add(d);
		r.addActionListener(this);
		l.addActionListener(this);
		u.addActionListener(this);
		d.addActionListener(this);
	}

	public void start(){}

	public void stop(){}

	public void destroy(){}

	public void actionPerformed(ActionEvent ae){
		if(ae.getSource() == r)
			x+=50;
		if(ae.getSource() == l)
			x-=50;
		if(ae.getSource() == u)
			y-=50;
		if(ae.getSource() == d)
			y+=50;
		repaint();
	}

	public void paint(Graphics g){
		g.drawString("Move Me!", 200+x, 200+y);
	}

}
