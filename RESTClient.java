import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class RESTClient {

	public static void main(String[] args) {

	 	getContacts();
		getContact(1);

	}


	static void getContacts()
	{
		try {

		URL url = new URL("http://localhost/RC/contacts");
		HttpURLConnection conn = (HttpURLConnection) url.openConnection();
		conn.setRequestMethod("GET");
		conn.setRequestProperty("Accept", "application/json");


		BufferedReader br = new BufferedReader(new InputStreamReader(
			(conn.getInputStream())));

		String output;
		while ((output = br.readLine()) != null) {
			System.out.println("\nGet Contacts Response:\n"+output);
		}

		conn.disconnect();

	  } catch(Exception e) {};
	}

	static void getContact(int id)
	{
		try {
		URL url = new URL("http://localhost/RC/contact?id="+id);
		HttpURLConnection conn = (HttpURLConnection) url.openConnection();
		conn.setRequestMethod("GET");
		conn.setRequestProperty("Accept", "application/json");


		BufferedReader br = new BufferedReader(new InputStreamReader(
			(conn.getInputStream())));

		String output = br.readLine();

		System.out.println("\nGet Contacts Response:\n"+output);
	

		conn.disconnect();

	  } catch(Exception e) {};

	}

}