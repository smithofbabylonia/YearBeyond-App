// Array of day names
var dayNames = new Array("Sunday","Monday","Tuesday","Wednesday",
				"Thursday","Friday","Saturday");

// Array of month Names
var monthNames = new Array(
"January","February","March","April","May","June","July",
"August","September","October","November","December");


const bookNames = new Array(
    "A bull with super powers ","A crocodile mother ","A den in the wood ","A fancy fruit salad ",
    "A new beginning ","A new dog ","A place to live ","A run in the park ","A squash and a squeeze ",
    "A swimming lesson ","Alphabets ","Angelina and the princess ","Animal fathers ","Animal homes ",
    "At the circus ","At the farm ","Baby ","Baby wakes up ","Ball theif ","Balloons ","Be careful ",
    "Beast feasts ","Bella at the ballet ","Bhatya and the mule ","Big and little ","Big bull ",
    "Big dinosaur ","Big feet ","Big gorilla ","Big sea animals ","Billy is hiding ","Bingo's ice cream ",
    "Blue, blue see ","Bread ","Breezing along ","Brown bear ","Brrrr! Its cold outside ","By the stream ",
    "Camel-back mountain ","Cards for gran ","Caring for myself ","Cat and fish ","Caterpillar, caterpillar ",
    "Changing colours ","Charlie cooks favourite book ","Clothes ","Come on, mum ","Cool sails ",
    "Count with me ","Crazy cat ","Crazy cat helps out ","Crocodile, tortoise and the kind man ",
    "Cutting machines ","Dad's boots ","Dance around the world ","Day and night in the desert ",
    "Dens and nests ","Dimo the monster ","Does a mole live in a hole? ","Down at the waterhole ",
    "Early readers ","Eating is noisy ","Eggs ","Emily ","Engelbert Sneem and the dream vaccuum cleaner ",
    "F ","Favourite places ","Feelings ","Finger fun ","Five fingers and a nose ","Fly away ",
    "Food for zebras ","Food of many colours ","Foot prints ","Freddie and the fairy ","Frog cards ",
    "Frogs in the pool ","Fun at the dam ","G ","Gabriel and Yohari at the sea ","Go away cat ",
    "Go away floppy ","Go mouse ","Go on mum ","Gogo and me ","Gogo's house ","Going on holiday ",
    "Going out ","Going under ","Going up ","Goofy's gags ","Grandfather's bull ","Granny's place ",
    "Greedy rabbit ","Grow me a picnic ","H ","Hands talk ","Handstand ","Harriet the hippo ",
    "Hattie and the fox ","Helicopters help ","Here comes little chimp ","Highest mountain, deepest canyon ",
    "Hippo has a hat ","Hippo's egg ","Hisssss! ","Houses ","How many legs? ","Hungry fox ",
    "Hurry Thulani, hurry! ","I ","I am a robot ","I am running ","I am wet ","I can ","I can paint ",
    "I don't want to ","I live in this world ","I see ","In our classroom ","In the garden ",
    "Inside and outside ","It doesn’t fit ","It started with a plant ","It's not fair ","J ",
    "Jack and Billy ","Jack's birthday ","Jake's job ","Just enough ","Just right ","K ",
    "Kea goes to school ","Keep moving ","Kind bird ","Kitty cat ","Kitty cat and fat cat ",
    "Kitty cat and the fish ","L ","Lauren's new hairdo ","Lenny's lost spots ","Let's make a garden ",
    "Let's play house ","Let's pretend ","Lets jump ","Lets keep South Africa clean ","Lettice ",
    "Little chimp ","Little chimp and big chimp ","Look after me ","Look at me ","Look at the house ",
    "Look at the web ","Look Bee ","Lots ","Lucas meets Harriet ","Lucky seal ","Lutho's dance class ",
    "M ","Mahuri Junction ","Making friends ","Mandevu means catfish ","Mark's river adventure ",
    "Measuring time ","Messages ","Mimi's Christmas ","Mimi's dancing feet ","Mkhulu and me ",
    "Molly's jolly brolly ","Monkey fun ","Monkey on the roof ","Mother bird ","Move over ",
    "My African animals ","My birthday present ","My book ","My clothes ","My family ","My holiday ",
    "My little cat ","My poetry pot ","My Sand castle ","N ","New trainers ","Night in the garden ",
    "Nina's game ","No bones ","Nobody wanted to play ","Number 7 ","O ","Octopus is a friend ",
    "Octopus mother ","Old stockings, please ","On the Sand ","One more ","Ouch! ","Our room ",
    "P ","Paint ","Party hats ","Patterns in nature ","People ","Photo time ","Play with me ",
    "Playing games ","Playing outside ","Pond dipping ","Pooh's bad dream ","Possum magic ",
    "Presents for dad ","Previously ","Pumla's pink pencil ","Q ","R ","Rabbit and frog ",
    "Racing ","Raj keeps a secret ","Red puppy ","Red's new bed ","Reds and blues ","Robot crab ",
    "Room on the broom ","Run chicken ","Run, cat boy, run ","Run, rabbit, run ","S ",
    "Sailor sid is sick ","Sam and Bingo ","Sam's ballon ","Sandwiches ","Save the star ",
    "Seasons ","See how I've grown ","Simon's scooter ","Sipho's new home ",
    "Sir Charlie stinky socks and the really big adventure ","Sleeping animals ","Sleepy boy ",
    "Smoke jumpers help ","Sniff ","Sophiatown ","Spider makes a home ","Splish Splash ",
    "Sports day ","Spots ","Stella gets stuck ","Sundays are the best days ","Super dog ","T ",
    "Tails ","Tam on top ","Taste ","Tata Mukuru's home ","Teaching and learning ","Teeth ",
    "The aliens go shopping ","The bad storm ","The best of me ","The big bully ","The big Hill ",
    "The big picnic ","The book shop ","The brave little penguin ","The cave ","The clinic ",
    "The egg hunt ","The food quiz ","The garden ","The gruffalo ","The Gruffalo Jigsaw book ",
    "The guessing game ","The ice rink ","The jungle box ","The king's pants ","The king's ride ",
    "The lucky dip ","The mud bath ","The odd one out ","The parade ","The play ","The rainbird ",
    "The rains came ","The rope swing ","The sand picnic ","The shoe shop ","The small dam ",
    "The snail and the whale ","The steel band ","The sweetest thing ","The swing ","The tall tree ",
    "The toy box ","The toy's party ","The toytown helicopters ","The toytown rescue ",
    "The treasure map ","The turtle's journey ","The wizard of oz ","The zigzag concert ",
    "Things have changed ","Things that go ","This old man ","Thito's fund rides ","Through the year ",
    "TJ's car ","Tom takes tea ","Top dog ","Tricky goose ","Tricky tiger ","Tyres and tubes ",
    "U ","Under the ice ","Up in the sky ","V ","Vumile and the dragon ","W ","Wait and see ",
    "Wait for me little tiger ","Water changes ","We 're going on a bear hunt ","We dress up ",
    "We need water ","What a bad dog ","What a week! ","What can I do? ","What do you do? ",
    "What dogs like ","What is long? ","What next? ","What's it made of? ","What's cooking ",
    "Wheels ","When I grow up ","Where are the bats? ","Where are we going ","Where can they live? ",
    "Where is dad? ","Whiskers ","Who lives there? ","Who paints the sky? ","Williams one wish ",
    "X ","Xolile ate ","Y ","You won't shift a hippo ","Yum yum! ","Z ","Ziyanda's flying machine ",
    "Zondelela and the river ");

var now = new Date();
const dated = new Date();
var date = dayNames[now.getDay()] + ", " + 
monthNames[now.getMonth()] + " " + 
now.getDate() + ", " + now.getFullYear();

var counter =1;

setInterval(function(){
    try {
        document.getElementById('radio'+counter).checked = true;
        counter++;
        if (counter>5) {
            counter=1;
        }
    } catch (TypeError) {
        return;
    }
},5000);


function sayHello(){
    if(document.body.clientWidth<400){
        document.getElementById("dateTime").innerHTML=date.substr(0,21); 
    }else{
        document.getElementById("dateTime").innerHTML=date;
    }
    var newName = document.getElementById("pageName").value;
    document.title = "Learner MS | "+newName;
    if(newName==="Learner"){
        var listing = document.getElementById("listing").value;
        var listed = listing.split("+");
        for(let runn of listed){
            if(runn=="") continue;
            var bnr = parseInt(runn)
            document.getElementById("areafiftyone").innerHTML+=bookNames[bnr]+"\n";
            bookList.push(runn);
        }
        for (let index = 0; index < bookNames.length; index++) {
            var b = document.createElement("option");
            var a = document.createTextNode(bookNames[index]);
            b.appendChild(a);
            document.getElementById("fiftyonebooks").appendChild(b);
            b.setAttribute("value",pad(index)+bookNames[index]);
        }
    }
    if(newName==="Notice"){
        makeCalendar();
        document.querySelector(".prev").addEventListener("click", () => {
            dated.setMonth(dated.getMonth() - 1);
            makeCalendar();
        });
          
        document.querySelector(".next").addEventListener("click", () => {
            dated.setMonth(dated.getMonth() + 1);
            makeCalendar();
        });
    }
}



function showIt() {
    document.getElementById("upload").style.display="block";

}
function change() {
    
}
function profileSet() {
    var name = document.getElementById("usern").innerText;
    document.getElementById("named").value=name;
}

function startUp() {
    profileSet();
    sayHello();
}
function pad(num) {
    var s = "0000" + num;
    return s.substr(s.length-4)+".";
}

function makeCalendar(){
    const lastDay = new Date(dated.getFullYear(), dated.getMonth() + 1, 0).getDate();
    const prevLastDay = new Date(dated.getFullYear(), dated.getMonth(), 0).getDate();
    const firstDayIndex = new Date(dated.getFullYear(),dated.getMonth(),1).getDay();
    const lastDayIndex = new Date(dated.getFullYear(), dated.getMonth() + 1,0).getDay();
    const nextDays = 6 - lastDayIndex;
    var sun = "";
    
    document.querySelector(".month-name").innerHTML=monthNames[dated.getMonth()];

    for (let x = firstDayIndex; x > 0; x--) {
        sun += `<li class="out">${prevLastDay - x+1}</li>`;
    }
    for (let i = 1; i <= lastDay; i++) {
        if (i === new Date().getDate() && dated.getMonth() === new Date().getMonth()) {
          sun += `<li class="active">${i}</li>`;
        } else {
          sun += `<li>${i}</li>`;
        }
    }
    for (let j = 1; j <= nextDays; j++) {
        sun += `<li class="out">${j}</li>`;
    }
    document.querySelector(".days").innerHTML=sun;
}