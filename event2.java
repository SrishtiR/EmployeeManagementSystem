import java.io.*;

import java.awt.*;
import java.applet.*;
import java.awt.event.*;
import java.sql.*;
public class event2 extends Applet implements ActionListener {
/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
Label l1,l2,l3,l4;
TextField t1,t2,t3,t4,t;
TextArea text;
Button b2;
String sal1;
String m;
String url = "jdbc:mysql://localhost:3306/";
String user = "root";
String password = "";


int x,y,result,sal,o,c;

public void init()
{
l1 = new Label("Employee ID");
l2 = new Label("Overtime");
l3 = new Label("Leaves");
l4 = new Label("result");

b2 = new Button("Go");
	 //Add some entries
	 t1 = new TextField(10);
	 t2 = new TextField(10);
	 t3 = new TextField(10);
	 t4 = new TextField(10);

	 add(l1);
	 add(t1);
	 add(b2);
	 add(l2);
	 add(t2);
	 add(l3);
	 add(t3);
	 add(l4);
	 add(t4);
	
	
	 b2.addActionListener(this);


} 

public void actionPerformed(ActionEvent a){
	
	//store the name of the button pressed in sString
			
				try { 
					Class.forName("com.mysql.jdbc.Driver").newInstance();
					Connection con = DriverManager.getConnection(url, user, password);
					
					Statement stt = con.createStatement();
					
					
					stt.execute("USE emp_mngt");
					String id = t1.getText();
					 
					 PreparedStatement prep = con.prepareStatement("SELECT * FROM time_info WHERE Employee_ID = ?");
				     prep.setString(1, id);
				     
				     ResultSet res = prep.executeQuery();
				     String ra,off;
				     while (res.next())
				     {
				    	 ra = res.getString("Worked_Hours");
				 		 off = res.getString("Off_Days");
				    		t2.setText(ra);
				    		t3.setText(off);
						   
				     }
				    
				     
				PreparedStatement prep1 = con.prepareStatement("SELECT * FROM salary_info WHERE Employee_ID = ?");
				     prep1.setString(1, id);
				     ResultSet k = prep1.executeQuery();
				     String rank;
				     x = Integer.parseInt(t3.getText());
					y=Integer.parseInt(t2.getText());
				     while (k.next())
				     {
				    	 rank = k.getString("Rank");

				    	 if(rank.equals("Manager")){
							 o = 65000 + 300*x +3000;
							c = 800 + 250 + 250*y;
							sal = o-c;
							sal1 = Integer.toString(sal);
							t4.setText(" "+sal1);}
						else if(rank.equals("Assistant")){
							 o = 45000 + 300*x +2000;
							c = 500 + 250 + 250*y;
							sal = o-c;
							sal1 = Integer.toString(sal);
							t4.setText(" "+sal1);}
							
						
				     
				     else if(rank.equals("Clerk")){
						 o = 30000 + 300*x +2000;
						c = 500 + 250 + 250*y;
						sal = o-c;
						sal1 = Integer.toString(sal);
						t4.setText(" "+sal1);}
				     }
					
				     
				     PreparedStatement prep2 = con.prepareStatement("UPDATE salary_info SET Monthly_Salary = ? WHERE Employee_ID = ?");
				     prep2.setString(1, sal1);
				     prep2.setString(2,id);
				     
				     prep2.execute();				     
				
				 }
				catch(Exception e)
				{ 
					 e.printStackTrace();
				}
			}
		
					
				
}


