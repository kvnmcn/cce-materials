    public class Main {
   public static void main(String[] args) {
      PrintingQueue queue = new PrintingQueue();
      PrintJob job1 = new PrintJob("J1", "document1.pdf", "Normal");
      queue.addJob(job1);
      PrintJob job2 = new PrintJob("J2", "presentation.pptx", "Urgent");
      queue.addJob(job2);
      PrintJob job3 = new PrintJob("J3", "image.jpg", "Urgent");
      queue.addJob(job3);
      queue.processJobs();
   }
}
  