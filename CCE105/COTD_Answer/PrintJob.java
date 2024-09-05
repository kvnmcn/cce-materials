    class PrintJob {
   String jobId;
   String fileName;
   String status;

   public PrintJob(String jobId, String fileName, String status) {
      this.jobId = jobId;
      this.fileName = fileName;
      this.status = status;
   }

   public String getJobId() {
      return this.jobId;
   }

   public void setJobId(String jobId) {
      this.jobId = jobId;
   }

   public String getFileName() {
      return this.fileName;
   }

   public void setFileName(String fileName) {
      this.fileName = fileName;
   }

   public String getStatus() {
      return this.status;
   }

   public void setStatus(String status) {
      this.status = status;
   }

   public boolean isUrgent() {
      return this.status.equalsIgnoreCase("Urgent");
   }
}