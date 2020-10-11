<?php

class ApplicationController{

	//dummy responses; these are probably actually built depending on what specifically the client is requesting using a model's methods or a SQL request, or in the case of HTML will render a .php file using attributes requested by the client
	const $getView = file_get_contents("path-to-get-response-html")
	const $postView = file_get_contents("path-to-post-response-html")

	const $getJson = //json formatted data response
	const $postJson = //json formatted data response


	public function execute($request, $response){

		switch ($request->getMethod()){
			case "GET":
				if(request->getHeader("request-type") == "html"){
						$response->withBody($getView);
						$response->withStatus(200, "OK");
					}
					elseif(request->getHeader("request-type") == "json"){
						$response->withBody($getJson);
						$response->withStatus(200, "OK");
					}
					else{
						$response->withStatus(400, "Expected request type to be HTML or JSON");
					}
				break;

			case "POST":
			//there is a case to be made for refactoring here as this code is very similar to the above. In fact, in most applications I would expect the POST method to redirect to the same response as the GET method once the update step has succeeded, with an additional notice that the initial POST succeeded
				if(validateParameters($request->getQueryParams())){
					//update database or whatever action POST is used for
					if(request->getHeader("request-type") == "html"){
						$response->withBody($postView);
						$response->withStatus(200, "OK");
					}
					elseif(request->getHeader("request-type") == "json"){
						$response->withBody($postJson);
						$response->withStatus(200, "OK");
					}
					else{
						$response->withStatus(400, "Expected request type to be HTML or JSON");
					}
				}
				else{
					$response->withStatus(400, "Request parameters did not pass validation.")
				}
				break;

			//other request methods can go here (DELETE etc)
		}
		return $response;
	}

	private function validateParameters($params) : bool{
		//compare the list of parameters sent by the client to the arguments expected by our model.
		//return true if they match, or false if they contain a parameter that we don't expect

		//this function should validate that the request is sending parameters that the model it is operating on expects (eg $user_id, $post_title, $post_text). It may forbid paramaters that the model has but which shouldn't be user defined, such as $post_timestamp, which will instead be generated by the controller

		//in my opinion, validating attributes (character length, numericality etc) should be done with model methods, which can be called from the controller, as these types of validations are important whenever a model is created (a user with server access could potentially create a new instance of a model while bypassing the controller, in which case we would still want such validations to run)
	}

	//our controller actions do have a very obvious amount of repeated code, which could be refactored using a method like the one below, however as this is mostly pseudo code and there is likely to be more complex actions regarding for example how the JSON data is generated, at this stage I would implement those actions before refactoring.

	/*
	private function okResponse($response,$body){
		$response->withBody($body);
		$response->withStatus(200, "OK");
		return $response;
	}
	*/
}