import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        PrintJobManager manager = new PrintJobManager();

        boolean continueAddingJobs = true;

        System.out.println("-------------------------------------");
        System.out.println("Welcome to Juan's School Print office:");
        System.out.println("-------------------------------------");
        System.out.println("Urgent Print jobs:");
        System.out.printf("[1] Final Exam Papers\n[2] Research Papers\n");
        System.out.println("=+=+=+=+=+=+=+=+=+=+=+=+=");
        System.out.println("Non-urgent Print jobs:");
        System.out.printf("[3] Lecture Notes\n[4] Assignment Guidelines\n");
        System.out.println("---------------------------------------------------------------------");
        while (continueAddingJobs) {
            System.out.println("What's your document name: ");
            String name = sc.nextLine();
            System.out.print("Input the number corresponding to the document you want to be printed: ");
            int choice = sc.nextInt();
            sc.nextLine();  // Consume newline left-over

            switch (choice) {
                case 1:
                    manager.addJob(new PrintJob(name, 1, true));
                    break;
                case 2:
                    manager.addJob(new PrintJob(name, 1, true));
                    break;
                case 3:
                    manager.addJob(new PrintJob(name, 1, false));
                    break;
                case 4:
                    manager.addJob(new PrintJob(name, 1, false));
                    break;
                default:
                    System.out.println("Invalid input. Retry.");
                    continue;  // Skip to next iteration of the loop
            }

            System.out.print("Do you want to add another job? (yes/no): ");
            String response = sc.nextLine().trim().toLowerCase();
            if (response.equals("no")) {
                continueAddingJobs = false;
            }
        }

        manager.processJob();
    }
}
