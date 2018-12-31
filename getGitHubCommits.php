<?php

// this snippet is a function that returns the number
// of commits in the last year given a GitHub username
	
function getNumberOfCommits($username) {
	
	// gets the contents of the GitHub page
	$content = file_get_contents('http://www.github.com/'.$username);

	// gets the number of commits in the last year
	$reduced = explode("js-yearly-contributions", $content)[1];
	$reduced = explode(" contributions", $reduced)[0];
	$reduced = explode("</h2>", $reduced)[0];
	$commits = explode("text-normal mb-2\">", $reduced)[1];
	
	return intval($commits);
}

// print the number of commits for a username
echo getNumberOfCommits("peterkabai");

?>