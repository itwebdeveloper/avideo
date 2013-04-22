// Your use of the YouTube API must comply with the Terms of Service:
// https://developers.google.com/youtube/terms

// Helper function to display JavaScript value on HTML page.
function showResponse(response) {
    var JSONObject = response;
    // document.getElementById("response").innerHTML = JSONObject.etag;
    var max_rows = 50;
    
    document.getElementById("response").innerHTML += "<input name=\"host\" type=\"hidden\" value=\"1\" />";
    document.getElementById("response").innerHTML += "<input name=\"max_rows\" type=\"hidden\" value=\""+max_rows+"\" />";
    
    for (var i=0;i<max_rows;i++) {
    	document.getElementById("response").innerHTML += "title: <input type=\"text\" name=\"title_"+i+"\" value=\""+JSONObject.items[i].snippet.title+"\" /> ";
    	document.getElementById("response").innerHTML += "description: <input type=\"text\" name=\"description_"+i+"\" value=\""+JSONObject.items[i].snippet.description+"\" /> ";
    	document.getElementById("response").innerHTML += "thumbnail_default: <input type=\"text\" name=\"thumbnail_default_"+i+"\" value=\""+JSONObject.items[i].snippet.thumbnails.default.url+"\" /> ";
    	document.getElementById("response").innerHTML += "thumbnail_medium: <input type=\"text\" name=\"thumbnail_medium_"+i+"\" value=\""+JSONObject.items[i].snippet.thumbnails.medium.url+"\" /> ";
    	document.getElementById("response").innerHTML += "thumbnail_high: <input type=\"text\" name=\"thumbnail_high_"+i+"\" value=\""+JSONObject.items[i].snippet.thumbnails.high.url+"\" /> ";
    	document.getElementById("response").innerHTML += "videoId: <input type=\"text\" name=\"host_video_ID_"+i+"\" value=\""+JSONObject.items[i].id.videoId+"\" /><br />";
    }
    document.getElementById("response").innerHTML += "<input name=\"videos_insert\" type=\"submit\" value=\"Salva nel DB\" />";
}

// Called automatically when JavaScript client library is loaded.
function onClientLoad() {
    gapi.client.load('youtube', 'v3', onYouTubeApiLoad);
}

// Called automatically when YouTube API interface is loaded (see line 9).
function onYouTubeApiLoad() {
    // See http://goo.gl/PdPA1 to get a key for your own applications.
    gapi.client.setApiKey('AIzaSyAWqopSdRpdL5GwUfc_VyC5GObPI416Otk');

    search();
}

function search() {
    // Use the JavaScript client library to create a search.list() API call.
    var request = gapi.client.youtube.search.list({
        part: 'snippet',
        q: 'sole',
        maxResults: 50
    });
    
    // Send the request to the API server,
    // and invoke onSearchRepsonse() with the response.
    request.execute(onSearchResponse);
}

// Called automatically with the response of the YouTube API request.
function onSearchResponse(response) {
    showResponse(response);
}