import java.util.*;
public class PrintJobManager {
    private Stack<PrintJob> urgentStack;
    private Queue<PrintJob> nonUrgentQueue; 

    public PrintJobManager() {
        this.urgentStack = new Stack<>();
        this.nonUrgentQueue = new LinkedList<>();
    }
    
    public void addJob(PrintJob job) {
        if (job.isUrgent) {
            urgentStack.push(job);
            System.out.println("Added to urgent stack: " + job);
        } else {
            nonUrgentQueue.add(job);
            System.out.println("Added to non-urgent queue: " + job);
        }
    }
    public PrintJob processJob() {
        if (!urgentStack.isEmpty()) {
            PrintJob job = urgentStack.pop();
            System.out.println("Processing from urgent stack: " + job);
            return job;
        } else if (!nonUrgentQueue.isEmpty()) {
            PrintJob job = nonUrgentQueue.poll();
            System.out.println("Processing from non-urgent queue: " + job);
            return job;
        } else {
            System.out.println("Both queues are empty.");
            return null;
        }
    }

    public boolean hasJobs() {
        return !urgentStack.isEmpty() || !nonUrgentQueue.isEmpty();
    }
}
