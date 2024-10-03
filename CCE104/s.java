package hash;

import java.util.LinkedList;

public class activity {

	private LinkedList<String>[] table;

	private int size;

	// Constructor to initialize the hash table

	public activity(int size) {

		this.size = size;

		table = new LinkedList[size];

		for (int i = 0; i < size; i++) {

			table[i] = new LinkedList<>();

		}

	}

// Hash function to calculate the hash value

	private int hash(String key) {

		int sum = 0;

		for (char c : key.toCharArray()) {

			sum += (int) c;

		}

		return sum % size;

	}

	// Inserts a new key into the hash table

	public void insert(String key) {

		int index = hash(key);

		if (!table[index].contains(key)) {

			table[index].add(key);

		}

	}

	// Deletes a key from the hash table

	public void delete(String key) {

		int index = hash(key);

		table[index].remove(key);

	}

	// Searches for a key in the hash table

	public boolean search(String key) {

		int index = hash(key);

		return table[index].contains(key);

	}

	// Displays the contents of the hash table

	public void viewTable() {

		for (int i = 0; i < size; i++) {

			System.out.print(i + ": ");

			for (String key : table[i]) {

				System.out.print(key + " -> ");

			}

			System.out.println("null");

		}

	}

public static void main(String[] args) {

	activity hashTable = new activity(11);


	
	hashTable.insert("Mia");
	hashTable.insert("Tim");
	hashTable.insert("Bea");
	hashTable.insert("Zoe");
	hashTable.insert("Sue");
	hashTable.insert("Len");
	hashTable.insert("Moe");
	hashTable.insert("Lou");
	hashTable.insert("Rae");
	hashTable.insert("Max");
	hashTable.insert("Tod");
	
	// View table contents

	System.out.println("Hash Table contents:");
	hashTable.viewTable();

	// Search for a key

	System.out.println("Searching for 'Rae': " + hashTable.search("Rae"));

	// Delete a key

	hashTable.delete("Rae");

	System.out.println("Searching for 'Rae' after deletion: " + hashTable.search("Rae"));

	}

}
