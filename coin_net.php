<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $pageTitle ?></title>
    <meta charset="utf-8">
    <link rel="icon" type="image/svg+xml" href="/aeolis/img/aeolis_logo.svg">
    <link rel="alternate icon" href="/aeolis/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <style>
        /*	Style Definitions  */
        .node {
            stroke: white;
            stroke-width: 2px;
        }

        .link {
            stroke: gray;
            stroke-width: 2px;
        }

        .plot {
            margin: 0 auto;
        }

        div.tooltip {
            position: absolute;
            text-align: center;
            width: 200px;
            height: 60px;
            padding: 2px;
            font: 20px sans-serif;
            background: lightsteelblue;
            border: 0px;
            border-radius: 8px;
            pointer-events: none;
        }

        /* The sidepanel menu */
        .sidepanel {
            height: 800px;
            /* Specify a height */
            width: 0;
            /* 0 width - change this with JavaScript */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Stay on top */
            top: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            overflow-x: hidden;
            /* Disable horizontal scroll */
            padding-top: 60px;
            /* Place content 60px from the top */
            transition: 0.5s;
            /* 0.5 second transition effect to slide in the sidepanel */
        }

        /* The sidepanel links */
        .sidepanel a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: rgba(0, 0, 0, 1);
            display: block;
            transition: 0.3s;
        }

        /* When you mouse over the navigation links, change their color */
        .sidepanel a:hover {
            color: #f1f1f1;
        }

        .netport {

            position: fixed;
            /* Stay in place */
            /*z-index: 1;  */
            top: 100px;
            left: 250px;

        }

        .sidebarcontent {
            font-size: 25px;
            float: left;
            clear: both;
            padding: 8px 8px 8px 32px;

        }
    </style>

</head>

<body style="margin:0;">
    <?php
    include('nav.php');
      ?>
    <main role="main">
        <br />
        <br /><br />
        <div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn float-right" onclick="closeNav()">&times;</a>
            <div id="sideContent" class="sidebarcontent">
            </div>
        </div>

        <button type="button" id="type_links-btn">Coins to Types</button>
        <br />
        <br />
        <button type="button" id="coin_obverse_links-btn">Coins to Obverse Dies</button>
        <br />
        <br />
        <button type="button" id="coin_reverse_links-btn">Coins to Reverse Dies</button>
        <br />
        <br />
        <button type="button" id="coin_links-btn">Obverse to Reverse Links</button>
        <br />
        <br />
        <button type="button" id="obverse_type_links-btn">Obverse to Type Links</button>
        <br />
        <br />
        <button type="button" id="reverse_type_links-btn">Reverse to Type Links</button>
        <br />
        <center>
            <div class="netport"><svg width="1500" height="600"></svg></div>
        </center>
        <script src="https://d3js.org/d3.v4.min.js"></script>
<script>
var graph;
var toggle = false;
var clicker = '';

var tooltip = d3.select("body")
.append("div")
.attr("class", "tooltip")
.style("opacity", 0);


var svg = d3.select("svg")
.call(d3.zoom().on("zoom", function() {
    svg.attr("transform", d3.event.transform)
}))
.append("g"),
width = +svg.attr("width"),
height = +svg.attr("height");

//for the information panel

/* Set the width of the sidebar to 250px (show it) */
function openNav() {
document.getElementById("mySidepanel").style.width = "250px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
document.getElementById("mySidepanel").style.width = "0";
}


//	d3 color scheme
var color = d3.scaleOrdinal(d3.schemeCategory10);

// elements for data join
var link = svg.append("g").selectAll(".link"),
node = svg.append("g").selectAll(".node");

//	simulation initialization
var simulation = d3.forceSimulation()
.force("link", d3.forceLink()
    .id(function(d) {
        return d.id;
    }))
.force("charge", d3.forceManyBody()
    .strength(function(d) {
        return -10;
    }))
.force("center", d3.forceCenter(width / 2, height / 2));

//	button event handling
//obviously should be a function; just trying to get it working before improving it
d3.select("#type_links-btn").on("click", function() {
update(graph.type_links);
});

d3.select("#coin_obverse_links-btn").on("click", function() {
update(graph.coin_obverse_links);
});

d3.select("#coin_reverse_links-btn").on("click", function() {
update(graph.coin_reverse_links);
});
d3.select("#coin_links-btn").on("click", function() {
update(graph.coin_links);
});
d3.select("#obverse_type_links-btn").on("click", function() {
update(graph.obverse_type_links);
});
d3.select("#reverse_type_links-btn").on("click", function() {
update(graph.reverse_type_links);
});

//	load and save data
d3.json("data/<?php echo $mint_choice ?>.json", function(err, gr_data) {
if (err) throw err;

graph = gr_data;
update(graph.coin_links);
});

//	follow v4 general update pattern
function update(link_type) {
// Update link set based on current state
// DATA JOIN
link = link.data(link_type);
// EXIT
// Remove old links
link.exit().remove();

// ENTER
// Create new links as needed.
link = link.enter().append("line")
    .attr("class", "link")
    .merge(link);

node = node.data(graph.nodes);

// EXIT
node.exit().remove();

// ENTER
node = node.enter().append("circle")
    .attr("class", "node")
    .attr("r", 10)
    .attr("fill", function(d) {
        return color(d.group);
    })
    .call(d3.drag()
        .on("start", dragstarted)
        .on("drag", dragged)
        .on("end", dragended)
    ).merge(node);

node.on("click", function(d) {
  console.log(d)
    if (String(d.kind) == 'coin') {
        var imgid = String(d.id).replace('c', '').replace('_', '');
        var eventText = '<b><a href="coins/' + imgid + '" target = "_blank">Coin ID: ' + imgid + '</a></b>';
        var imgsource = '<img src="https://raw.githubusercontent.com/Aeolian-Alexanders/coins/master/images/';
        eventText = eventText + '<br /><br />' + imgsource + imgid + '_o.png" alt="coin obverse image" class="img-thumbnail">';
        eventText = eventText + '<br /><br />' + imgsource + imgid + '_r.png" alt="coin obverse image" class="img-thumbnail">';
    }

    else if (String(d.kind) == 'obverse') {
        var imgid = String(d.id);
        var eventText = '<b><a href="/aeolis/obversedies/' + imgid + '" target = "_blank">Obverse ID: ' + imgid + '</a></b>';
    }
    else if (String(d.kind) == 'reverse') {
        var imgid = String(d.id);
        var eventText = '<b><a href="/aeolis/reversedies/' + imgid + '" target = "_blank">Reverse ID: ' + imgid + '</a></b>';
    }


    else {
        var eventText = '<b>ID: ' + d.id + '</b>';
        eventText = eventText + '<br /><b>Type: ' + d.kind + '</b>';
    }

    $('#sideContent').html(eventText);
    openNav();
});

node.on('mouseover.tooltip', function(d) {
        tooltip.transition()
            .duration(30)
            .style("opacity", .8);
        tooltip.html("ID: " + d.id + "<p/>Kind: " + d.kind)
            .style("left", (d3.event.pageX) + "px")
            .style("top", (d3.event.pageY + 10) + "px");
    })
    .on("mouseout.tooltip", function() {
        tooltip.transition()
            .duration(10)
            .style("opacity", 0);
    })
    .on("mousemove", function() {
        tooltip.style("left", (d3.event.pageX) + "px")
            .style("top", (d3.event.pageY + 10) + "px");
    });


//	Set nodes, links, and alpha target for simulation
simulation
    //	.nodes(newNodes)
    .nodes(graph.nodes)
    .on("tick", ticked);

simulation.force("link")
    .links(link_type);

simulation.alphaTarget(0.3).restart();

}
//	drag event handlers
function dragstarted(d) {
if (!d3.event.active) simulation.alphaTarget(0.3).restart();
d.fx = d.x;
d.fy = d.y;
}

function dragged(d) {
d.fx = d3.event.x;
d.fy = d3.event.y;
}

function dragended(d) {
if (!d3.event.active) simulation.alphaTarget(0);
d.fx = null;
d.fy = null;
}

//	tick event handler (nodes bound to container)
function ticked() {
link
    .attr("x1", function(d) {
        return d.source.x;
    })
    .attr("y1", function(d) {
        return d.source.y;
    })
    .attr("x2", function(d) {
        return d.target.x;
    })
    .attr("y2", function(d) {
        return d.target.y;
    });

node
    .attr("cx", function(d) {
        return d.x;
    })
    .attr("cy", function(d) {
        return d.y;
    });
}
</script>
</body>
</html>
