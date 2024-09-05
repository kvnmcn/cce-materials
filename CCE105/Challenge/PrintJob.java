public class PrintJob {
    private static int idCounter = 1; 
    String name;
    int jobId;
    String status;

    PrintJob(String name, int jobId, String status) {
        this.name = name;
        this.jobId = idCounter++;
        this.status = status;
    }

    @Override
    public String toString() {
        return "Print job {id=" + jobId + ", name='" + name + "', status=" + status + "}";
    }

    public int getJobId() {
        return this.jobId;
     }
  
     public void setJobId(int jobId) {
        this.jobId = jobId;
     }
  
     public String getFileName() {
        return this.name;
     }
  
     public void setFileName(String fileName) {
        this.name = fileName;
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

