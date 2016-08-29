package com.greatwest.employeeNF;

import java.sql.*;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.InputMismatchException;
import java.util.Scanner;


class InvalidIDException extends Exception {
	public InvalidIDException(String msg){
	      super(msg);
	   }

}

public class Employee {
	Connection con = null;
	Statement stmt = null;
	PreparedStatement pstmt = null;
	Scanner scan = new Scanner(System.in);
	ResultSet rs;
	String tablen;
	PreparedStatement pstm = null;

	E()
	{
		try{
			try {
				Class.forName("oracle.jdbc.OracleDriver");
			} catch (ClassNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}

			

			con = DriverManager.getConnection(
					"url", "username",
					"password");

			

			stmt = con.createStatement();
		} catch(SQLException e){
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
			
	
		
	}
	int getId()
	{
		int id = 0;
		boolean invalid = false;
		do{
		try{
		System.out.println("Enter ID");
		invalid = false;
		id = scan.nextInt();
		scan.nextLine();
		} catch(InputMismatchException e){
			System.out.println("Integer only. Enter again");
			invalid = true;
			scan.nextLine();
		}
		}while(invalid);
		
		return id;
		
	}
	int getAge()
	{
		int age = 0;
		boolean invalid = false;
		do{
		try{
		invalid = false;
		System.out.println("Enter Age");
		
		age = scan.nextInt();
		scan.nextLine();
		} catch(InputMismatchException e){
			System.out.println("Integer only. Enter again");
			invalid = true;
			scan.next();
			
		}
		if(age<=18 || age>60){
			System.out.println("Invalid age. Enter again(between 18 to 59)");
			invalid = true;
		}
		}while(invalid);
		return age;
		
	}
	static int getChoice()
	{
		Scanner sc = new Scanner(System.in);
		int ch = 0;
		boolean invalid = false;
		do{
		try{
		invalid = false;
		System.out.println("Enter  1 to add \n 2 to View \n 3 to delete \n 4 to update \n 5 to exit");
		
		ch = sc.nextInt();
		sc.nextLine();
		} catch(InputMismatchException e){
			System.out.println("Integer only. Enter again");
			invalid = true;
			sc.next();
			
		}
	
		if(ch<1 || ch>4){
			System.out.println("Invalid choice. Enter again");
			invalid = true;
		}
		}while(invalid);
		return ch;
		
	}
	String getName()
	{
		String name = null;
		boolean invalid = false;
		String regex = "^[a-zA-z ]*$";
		do{
		try{
		System.out.println("Enter Name");
		invalid = false;
		name = scan.nextLine();
		if(!name.matches(regex)){
			invalid = true;
		System.out.println("Enter only alphabets and spaces");
		}
		//scan.nextLine();
		} catch(InputMismatchException e){
		}
		}while(invalid);
		return name;
	}
	double getSalary()
	{
		double sal = 0;
		boolean invalid = false;
		do{
		try{
		System.out.println("Enter Salary");
		invalid = false;
		sal = scan.nextDouble();
		scan.nextLine();
		} catch(InputMismatchException e){
			System.out.println("Double only. Enter again");
			invalid = true;
			scan.next();
			
		}
		if(sal<0){
			invalid = true;
		}
		}while(invalid);
		return sal;
	}
	String getDesig()
	{
		String desig = null;
		boolean invalid = false;
		do{
		try{
		System.out.println("Enter Designation");
		invalid = false;
		desig = scan.nextLine();
		//scan.nextLine();
		} catch(InputMismatchException e){
			System.out.println("String only. Enter again");
			invalid = true;
			scan.next();
			
		}
		}while(invalid);
		return desig;
	}
	String getCompname()
	{
		String comp = null;
		boolean invalid = false;
		do{
		try{
		System.out.println("Enter Company Name");
		invalid = false;
		comp = scan.nextLine();
		//scan.nextLine();
		} catch(InputMismatchException e){
			System.out.println("String only. Enter again");
			invalid = true;
			scan.next();
			
		}
		}while(invalid);
		return comp;
	}
	String getDOB()
	{
		String dob = null;
		boolean invalid = false;
		do{
		try{
		System.out.println("Enter DOB in the form yyyy-mm-dd");
		invalid = false;
		dob = scan.next();
		scan.nextLine();
		} catch(InputMismatchException e){
			System.out.println("String only. Enter again");
			invalid = true;
			scan.next();
			
		}
		}while(invalid);
		return dob;
	}
	String getAddress()
	{
		String addr = null;
		boolean invalid = false;
		do{
		try{
		System.out.println("Enter address");
		invalid = false;
		addr = scan.nextLine();
		
		} catch(InputMismatchException e){
			System.out.println("String only. Enter again");
			invalid = true;
			scan.next();
			
		}
		}while(invalid);
		return addr;
	}
	String getPhno()
	{
		String no = null;
		boolean invalid = false;
		do{
		try{
		System.out.println("Enter Phone number");
		invalid = false;
		no = scan.next();
		scan.nextLine();
		} catch(InputMismatchException e){
			System.out.println("String only. Enter again");
			invalid = true;
			scan.next();
			
		}
		if(!no.matches("\\d{10}")){
			System.out.println("Invalid phone number. Enter 10 digit number");
			invalid = true;
		}
		}while(invalid);
		return no;
	}
	
	void Add() 
	{
		int id = 0;
		int age = 0;
		String name = null;
		double sal = 0;
		int a =0;
		String desig = null;
		String compname = null ;
		String dob = null;
		String address = null;
		String phno = null;
		Scanner scan = new Scanner(System.in);
		ResultSet b;
		
		boolean hasnext = true;
		try {
			do{
				id = getId();
				String query = "Select * from GWGEMS20 where id="+id;
			
				b =stmt.executeQuery(query);
				if(b.next()){
					System.out.println("ID exists. Enter again");
					continue;
				} else {
					hasnext = false;
				}
			
			}while(hasnext);
			
			} catch (SQLException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		
		
		
		name = getName();
		age = getAge();
		sal = getSalary();
		desig = getDesig();
		compname = getCompname();
		phno = getPhno();
		dob = getDOB();
		String regex = "^((19)\\d\\d)-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])$";
		while(!dob.matches(regex)){
			System.out.println("Invalid date. Enter again(year: 1900-1999, month: 1-12, day: 1-31)");
			dob = getDOB();
		}
		address = getAddress();
		
		try
		{
			String ins = "INSERT into GWGEMS20"+
					"(id,name,age,salary,desig,company,dob,Address,phone) VALUES "+
				"(?,?,?,?,?,?,?,?,?)";
		 	pstmt = con.prepareStatement(ins);
		 	pstmt.setInt(1, id);
			pstmt.setString(2,name);
		    pstmt.setInt(3, age);
		   	pstmt.setDouble(4,sal);
		    pstmt.setString(5, desig);
		    pstmt.setString(6,compname);
		    pstmt.setString(7, dob);
		    pstmt.setString(8,address);
		    pstmt.setString(9, phno);
		    pstmt.executeUpdate();
		    System.out.println("Employee info added");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} 
		
		
	
	}
	void View() throws InvalidIDException
	{
		
		ResultSet r = null;
		boolean f = false;	
		int id = getId();
		String query = "Select * from GWGEMS20 where id="+id;
		try{
			 r = stmt.executeQuery(query);
			
		} catch(Exception e){
			e.printStackTrace();
		}
		
		try {
			
			while(r.next())
			{
				f = true;
				System.out.println(r.getString(1)+" "+r.getString(2)+" "+r.getString(3)+" "+r.getString(4)+" "+r.getString(5)+" "+r.getString(6)+" "+r.getString(7)+" "+r.getString(8)+" "+r.getString(9));
				
			}
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		if(!f){
		throw new InvalidIDException("Invalid employee ID");
	}
		
	}
	
	public void update() throws InvalidIDException
	{
		ResultSet r = null;
	
		int id = getId();
		String newaddress = null;
		String newphoneno = null;
		//	System.out.println("New");
			newaddress=getAddress();
		//	System.out.println("New");
			newphoneno=getPhno();
			String s2="UPDATE  GWGEMS20 SET Address= ? where id= "+id;
			String s3="UPDATE GWGEMS20 SET phone= ? where id= "+id;
			
			
			try {
	    	 pstmt = con.prepareStatement(s2);
	    	 pstmt.setString(1, newaddress);
	    	 
	    	 pstmt.executeUpdate();
	    	 
	    	 pstm = con.prepareStatement(s3);
	    	 pstm.setString(1, newphoneno);
	    	 
	    	 pstm.executeUpdate();
	    	 
				
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
	     
	     System.out.println("The employee information has been updated");
	}
	
	public void delete() throws InvalidIDException
	{
		int b = 0;
		
			int id = getId();
			try
			{
				
				String s2="DELETE FROM GWGEMS20 " +
			               "WHERE id ="+id;
				String s3 = "Select id from GWGEMS20";
				b = stmt.executeUpdate(s2);
				if(b == 0){
				      
				   
						throw new InvalidIDException("Invalid employee ID");
				} else {
					System.out.println("Employee info deleted");
				}
		}
			
		
		
		catch (SQLException e)
		{
			e.printStackTrace();
		}
		
	}
	
	public static void main(String args[]){

		Employee e = new Employee();
		boolean x =true;
		Scanner sc = new Scanner(System.in);
		boolean m =true;
		int k=0;
		do {
			
			int choice = getChoice();
			
		switch(choice){
			
			case 1:
			{
				e.Add();
				break;
			}
			case 2:
			{
			do{
				k=0;
			try {
				e.View();
			} catch (InvalidIDException e1) {
				// TODO Auto-generated catch block
				//e1.printStackTrace();
				System.out.println("Invalid ID");
				k=1;
			}
			}while(k==1);
			break;
			}
			case 4:{
			do{
			
			k=0;
			try {
				e.update();
			} catch (InvalidIDException e1) {
				// TODO Auto-generated catch block
				//e1.printStackTrace();
				System.out.println("Invalid ID");
				k=1;
			}
			}while(k==1);
			break;
			}
			case 3:
			{
			do{
				k=0;
			try {
				e.delete();
			} catch (InvalidIDException e1) {
				// TODO Auto-generated catch block
				k=1;
				System.out.println("Invalid ID");
			}
			}while(k==1);
			break;
		
		}
			case 5:
			{
				System.exit(0);
			}
		}
		
		do{
		
		System.out.println("Press 1 to continue, 2 to exit");
		k=sc.nextInt();
		if(k!=1 && k!=2){
			
			System.out.println("Wrong choice entered. Try again.");
			x =false;
		} else {
			x = true;
		}
		if(k==2){
			System.exit(0);
		}
		}while(x == false);
	} while(k==1);

}
}
