<template>
	<div>
		<div class="container mt-4">
	      <div class="row">
	        <div class="col">
	          <Search />
	        </div>
	      </div>
	    </div>
	</div>
</template>

<script>
import Search from "~/components/Search.vue";
export default {
  data: function() {
    return {
      recomments: [
        {
          id: 1,
          price: 2500,
          image: "/post/01.png",
          url: "",
          title:
            "ICSA Course 2020 by Qten teacher ICSA Course 2020 by Qten teacher ICSA Course 2020 by Qten teacher",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 2,
          price: 2500,
          image: "/post/02.png",
          url: "",
          title: "Music events live in concert 2020",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 3,
          price: 2500,
          image: "/post/03.png",
          url: "",
          title: "5.5 Shopping Day by Robinson",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 4,
          price: 2500,
          image: "/post/04.png",
          url: "",
          title: "Furniture Fare 2020 by IKEA",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 5,
          price: 2500,
          image: "/post/05.png",
          url: "",
          title: "Furmiture Festival 10.10 ตุลาคม",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        }
      ],
      hooperNews: {
        infiniteScroll: true,
        autoPlay: true,
        playSpeed: 3200,
        trimWhiteSpace: true,
        itemsToShow: 1.25,
        breakpoints: {
          992: {
            itemsToShow: 4.25
          }
        }
      }
    };
  },
  components: {
    Search
  }
};
</script>
