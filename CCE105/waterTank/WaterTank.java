package Water;

public class WaterTank {
	private int capacity;
	private int currentLevel;
	
	// Constructor 
	public WaterTank(int capacity) {
		this.capacity = capacity;
		this.currentLevel = 0;
	}
	// Transformer
	public void fill(int amount) {
		if (currentLevel >= capacity) {
			currentLevel = capacity;
		}
		else {
			currentLevel += amount;
		}
	}
	public void drain(int amount) {
		if (currentLevel < 0) {
			currentLevel = 0;
		}
		else {
			currentLevel -= amount;
		}
	}
	// Observer
	public int getCurrentLevel() {
		return currentLevel;
	}
	public int getCapacity() {
		return capacity;
	}
}