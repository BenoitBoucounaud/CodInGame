import java.util.*;
import java.io.*;
import java.math.*;


class Solution {

    public static void main(String args[]) {
        Scanner in = new Scanner(System.in);
        int N = in.nextInt(); // Number of elements which make up the association table.
        int Q = in.nextInt(); // Number Q of file names to be analyzed.
        
        String[][] mime=new String[N][2];
        for (int i = 0; i < N; i++) {
            String EXT = in.next(); // file extension
            String MT = in.next(); // MIME type.
            String goblet = EXT + "," + MT;
            String[] EM = goblet.split(",");
            mime[i][0] = (EM[0]);
            mime[i][1] = (EM[1]);
        }
        
        in.nextLine();
        
        for (int i = 0; i < Q; i++) {
            String FNAME = in.nextLine(); // One file name per line.
            String[] fname = FNAME.split("\\.");
            char last = FNAME.charAt(FNAME.length()-1);
            
            //-----Check the corect writing of fname's last split-----//
            if(fname.length==0 || fname.length==1 || last == '.'){
                System.out.println("UNKNOWN");
            }
            //-----Compare fname's last split and correct MIME Type-----//
            else{
                String toAnalyse = new String(fname[(fname.length)-1]);
                boolean verification=false;
                
                for (int k=0; k < N ;k++){
                    if ((toAnalyse.equalsIgnoreCase(mime[k][0]))==true ){
                        System.out.println(mime[k][1]);
                        verification = true;
                    }
                }
                //-----Write the answer-----//
                if (verification == false)
                    System.out.println("UNKNOWN");
                    
            }
        }
    }
}