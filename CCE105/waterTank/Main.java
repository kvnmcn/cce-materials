package Water;

public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		WaterTank tank = new WaterTank(100);
		tank.fill(150);
		System.out.printf("Current Level: %d", tank.getCurrentLevel());
	}

}
