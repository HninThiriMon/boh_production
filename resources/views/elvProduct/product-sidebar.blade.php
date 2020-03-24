
<style>


.nb {
  overflow: hidden;
  background-color: rgba(0, 0, 0, 0.24);
}

.nb a {
  float: left;
  /* font-size: 16px; */
  color: white;
  text-align: center;
  /* padding: 14px 16px; */
  text-decoration: none;
}

.dD {
  float: left;
  overflow: hidden;
}

.dD .dbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
/* 
.nb a:hover, .dD:hover .dbtn {
 
} */

.nb .dbtn{
    background-color: #343a40;
}

.dD-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  /* min-width: 160px; */
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dD-content a {
  float: none;
  color: black;
  /* padding: 12px 16px; */
  text-decoration: none;
  display: block;
  text-align: left;
}

.dD-content a:hover {
  background-color: #343a40;
  color: #fff;
}

.dD:hover .dD-content {
  display: block;
}

.category{
    padding-left : 309px ;
}
/* 
.list-group-item {
 padding: 0 !important;
} */
.w {
 width: 248px;
}
.card{
 width: 244px;
}

</style>

<div class="nb">
  <!-- <a href="#home">Home</a>
  <a href="#news">News</a> -->
  <div class="dD">
  <div class="category">
    <button class="dbtn"><i class="fa fa-list"></i> &nbsp; &nbsp;  C A T E G O R I E S &nbsp; &nbsp; 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dD-content">
       <ul class="list-group category_solution w">
       @foreach($elvSolutions as $elvSolution)
           <li class="list-group-item" onclick="solutionFilter('{{$elvSolution->name}}');">
           <a href="#"> {{$elvSolution->name}}</a></li>
       @endforeach
       </ul>
    </div>
    </div>
  </div> 
</div>
<br><br><br>