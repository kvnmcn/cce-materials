import java.util.*;

public class PrintJobManager {
    @SuppressWarnings({ "unchecked", "rawtypes" })
    Queue<PrintJob> nonUrgent = new LinkedList();
    @SuppressWarnings({ "unchecked", "rawtypes" })
    Stack<PrintJob> urgent = new Stack();
    @SuppressWarnings({ "unchecked", "rawtypes" })
    LinkedList<PrintJob> jobList = new LinkedList();

    public void addJob(PrintJob job) {
        if (job.isUrgent()) {
            this.urgent.push(job);
            System.out.println("Added to urgent stack: " + job);
        } else {
            nonUrgent.add(job);
            System.out.println("Added to non-urgent queue: " + job);
        }
        this.jobList.add(job);
    }

    public void processJobs() {
        PrintJob job;
        while(!this.urgent.isEmpty()) {
           job = (PrintJob)this.urgent.pop();
           this.processJob(job);
        }
  
        while(!this.nonUrgent.isEmpty()) {
           job = (PrintJob)this.nonUrgent.poll();
           this.processJob(job);
        }
  
     }

    private void processJob(PrintJob job) {
        System.out.println("Processing job: " + job.getJobId());
        job.setStatus("Processing");
        Iterator<PrintJob> iterator = this.jobList.iterator();
  
        while(iterator.hasNext()) {
           PrintJob k = (PrintJob)iterator.next();
           if (k.getJobId() == (job.getJobId())) {
              k.setStatus("Completed");
              System.out.println("Completed: " + k.getJobId());
              break;
           }
        }
  
     }
}
