public class PrintJob {
    private static int idCounter = 1; 
    String name;
    int jobId;
    boolean isUrgent;

    PrintJob(String name, int jobId, boolean isUrgent) {
        this.name = name;
        this.jobId = idCounter++;
        this.isUrgent = isUrgent;
    }

    @Override
    public String toString() {
        return "PrintJob {id=" + jobId + ", name='" + name + "', urgent=" + isUrgent + "}";
    }
}

