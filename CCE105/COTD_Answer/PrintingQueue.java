    import java.util.Iterator;
import java.util.LinkedList;
import java.util.Queue;
import java.util.Stack;

class PrintingQueue {
   Queue<PrintJob> generalQueue = new LinkedList();
   Stack<PrintJob> urgentQueue = new Stack();
   LinkedList<PrintJob> jobList = new LinkedList();

   public void addJob(PrintJob job) {
      if (job.isUrgent()) {
         this.urgentQueue.push(job);
      } else {
         this.generalQueue.add(job);
      }

      this.jobList.add(job);
   }

   public void processJobs() {
      PrintJob job;
      while(!this.urgentQueue.isEmpty()) {
         job = (PrintJob)this.urgentQueue.pop();
         this.processJob(job);
      }

      while(!this.generalQueue.isEmpty()) {
         job = (PrintJob)this.generalQueue.poll();
         this.processJob(job);
      }

   }

   private void processJob(PrintJob job) {
      System.out.println("Processing job: " + job.getJobId());
      job.setStatus("Processing");
      Iterator var3 = this.jobList.iterator();

      while(var3.hasNext()) {
         PrintJob j = (PrintJob)var3.next();
         if (j.getJobId().equals(job.getJobId())) {
            j.setStatus("Completed");
            break;
         }
      }

   }
}
    