import java.util.*;
import java.lang.*;

class Str{
	public static void main(String args[])
	{
		int count=0;
	Scanner sc=new Scanner(System.in);
	System.out.println("enter 2 strings");
	String s1=sc.nextLine();
	String s2=sc.nextLine();
	s1=s1.replaceAll("\\s+","");
	s2=s2.replaceAll("\\s+","");
	
	int m=s1.length();
	int n=s2.length();
	s1=s1.toLowerCase();
	s2=s2.toLowerCase();
	if(m==n)
	{
		char[] char1=s1.toCharArray();
	    char[] char2=s2.toCharArray();
	    Arrays.sort(char1);
	     Arrays.sort(char2);
	    for(int i=0;i<m;i++)
		{
			if(char1[i]!=char2[i])
			{count=0;
			break;}
			else 
				count =1;
		}
		if(count==1)
			System.out.println("string is anagram");
		else 
			System.out.println("string not an anagram");
	}
	else
		System.out.println("string not an anagram");
	
	}
	
	
	
	
	
}
class Calc{
	public void count(char a[])
	{ for(int i=0;i<a.length;i++)
		{
			if(a[i]
		
	
			
			