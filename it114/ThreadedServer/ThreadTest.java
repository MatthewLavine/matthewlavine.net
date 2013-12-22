public class ThreadTest extends Thread {

	public ThreadTest(String name){
		super(name);
	}

	public void run(){

		for(int i = 0; i <= 100; i++){

			System.out.println(getName() + " " + i + "% Complete.");

			try {
				sleep(10);
			} catch(InterruptedException ie){
				System.out.println(ie);
			}

		}

		System.out.println(getName() + " has finished!");

	}

	public static void  main(String[] args){

		ThreadTest t1 = new ThreadTest("Task1");
		ThreadTest t2 = new ThreadTest("Task2");
		ThreadTest t3 = new ThreadTest("Task3");
		ThreadTest t4 = new ThreadTest("Task4");
		ThreadTest t5 = new ThreadTest("Task5");
		ThreadTest t6 = new ThreadTest("Task6");
		ThreadTest t7 = new ThreadTest("Task7");
		ThreadTest t8 = new ThreadTest("Task8");

		t1.start();
		t2.start();
		t3.start();
		t4.start();
		t5.start();
		t6.start();
		t7.start();
		t8.start();
	}
}
