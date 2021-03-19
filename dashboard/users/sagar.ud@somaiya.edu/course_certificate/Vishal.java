import java.util.*;
class Vishal{
public static void main(String args[]){
Vector v=new Vector();
//Vector w=new Vector();
Scanner sc=new Scanner(System.in);
String s;
int n;
int count;
for(int i=0;i<args.length;i++)
{
	
	v.add(args[i]);
}


while(true)
{
	System.out.println("1=add element at a give position");
	System.out.println("2=add element at end(enter item name to be inserted)");
	System.out.println("3=delete a given element(enter item name to be deleted)");
	System.out.println("4=displaying list");
	System.out.println("5=exit");
    System.out.println("enter the choice");	
	count=sc.nextInt();
	if(count==5)
		break;
	else
	{
	switch(count)
	{
		case 1:
		{System.out.println("enter the position and item name respectively");
		n=sc.nextInt();
		s=sc.next();
		v.add(n,s);
		break;}
		case 2:
		{System.out.println("enter the item to be inserted");
		s=sc.next();
		v.add(s);
		break;}
		case 3:
		{System.out.println("enter the item to be deleted");
		s=sc.next();
		v.remove(s);
		break;}
		case 4:
		{Enumeration vEnum=v.elements();
        while(vEnum.hasMoreElements()){
        System.out.println(vEnum.nextElement());
		}
		break;}
	}
	}
}
}
}
