
<?php 
include('db.php');
if(empty($_SESSION['user_id'])){
  
  header('location:sign_in.html');
}
include('user_header.php');
include('user_navbar.php');

?>

<div class="container">
<div class="row">
  <div class="col-md-12">
     <img src="search3.jpeg" width="100%">
     <h3>INTRODUCTION</h3>
     <p>Boutique Hotel Budapest**** was opened in August 2006, in the heart of Budapest, within the triangle formed by the bustling pedestrian shopping street Vaci utca, the fascinating Central Market Hall and the Liberty Bridge. In addition to excellent transport links at the meeting point of a main metro line and tram line, the hotel is surrounded by the city centre’s elegant shops, cafés, restaurants, bars, the famous Gellert Thermal Spa, Szabadsag hid and other tourist sights just a few steps from the left bank of the Danube.</p>
     <img src="intro.jpg" width="100%" >
     <p style="padding: 2px 5px;">Our hotel established a new trend on the Hungarian market, that are known as city lifestyle (design and boutique) hotels. Our four-star hotel with its 74 rooms offering comfort and relaxation reflects the very popular, modern yet elegant style of international boutique hotels.</p>
<p>
Each of our rooms with their simple, fresh and warm style, and welcoming colours meet current city design and comfort standards. With the exception of our 14 rooms with single beds, every room has a queen-size double bed. The deluxe interiors of our rooms are completed by LCD television, high-speed internet connection, mini bar and a modern bathroom.
</p><p>
Our buffet breakfast includes both international and Hungarian specialities. The Araz Bistro & Bar’s special range features light and tasty sandwiches, salads, unique international and Hungarian cakes and pastries, coffee specialities and a wide range of drinks.
</p><p>
ZeinaHotels' motto “Enjoy the hospitality!” expresses the desire of the Concierge to make leisure, business and conference guests feel like at home in what may initially be an unfamiliar city environment by taking care of them.

We hope we will be able to take care of you soon!</p>
  </div>
</div> 
  

	</div>





<?php include('user_footer.php');?>