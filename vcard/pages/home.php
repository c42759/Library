<?php

$page_template = file_get_contents("templates/home.html");

include "pages-e/header.php";
include "pages-e/footer.php";

$user = explode("-", $pg);

$object_vcard = new vcard();
$object_vcard->setId($user[0]);
$vcard = $object_vcard->returnOneVcard();

if (isset($vcard["published"]) && $vcard["published"] == true) {
	if ($pg != $vcard["id"]."-".str_replace(" ", "-", strtolower($vcard["name"]))) {
		header("Location: ".sprintf("%s/0/%s/%s-%s/", $configuration["path"], $lg_s, $vcard["id"], str_replace(" ", "-", strtolower($vcard["name"]))));
	} else {
		$account["name"] = 1;
		$article = new article();
		$article->setId(1);
		$article = $article->returnOneArticle();

		$configuration["site-name"] = $vcard["name"]." @ ".$vcard["c_name"];
		$bg = getImgsFilter (1, "article", ["bg"]);
		$photo =  getImgsFilter($vcard["id"], "vcard", ["photo"]);
		$logo =  getImgsFilter($vcard["id"], "vcard", ["logo"]);

		/* last thing */
		$template = str_replace(
			[
				"{c2r-header}",
				"{c2r-footer}",

				"{c2r-bg}",

				"{c2r-file-photo}",

				"{c2r-name}",
				"{c2r-employ}",

				"{c2r-contacts-hidden}",

				"{c2r-phone-hidden}",
				"{c2r-phone}",

				"{c2r-skype-hidden}",
				"{c2r-skype}",

				"{c2r-viber-hidden}",
				"{c2r-viber}",

				"{c2r-whatsapp-hidden}",
				"{c2r-whatsapp}",

				"{c2r-email-hidden}",
				"{c2r-email}",

				"{c2r-social-hidden}",

				"{c2r-fb-hidden}",
				"{c2r-fb}",

				"{c2r-g+-hidden}",
				"{c2r-g+}",

				"{c2r-pi-hidden}",
				"{c2r-pi}",

				"{c2r-yt-hidden}",
				"{c2r-yt}",

				"{c2r-tw-hidden}",
				"{c2r-tw}",

				"{c2r-in-hidden}",
				"{c2r-in}",

				"{c2r-file-logo}",

				"{c2r-c-name}",
				"{c2r-c-area}",

				"{c2r-c-contacts-hidden}",

				"{c2r-c-phone-hidden}",
				"{c2r-c-phone}",

				"{c2r-c-fax-hidden}",
				"{c2r-c-fax}",

				"{c2r-c-skype-hidden}",
				"{c2r-c-skype}",

				"{c2r-c-email-hidden}",
				"{c2r-c-email}",

				"{c2r-c-gps-hidden}",

				"{c2r-c-gps-hidden}",
				"{c2r-c-gps}",

				"{c2r-c-website-hidden}",
				"{c2r-c-website}",

				"{c2r-c-street-hidden}",

				"{c2r-c-street}",
				"{c2r-c-city}",
				"{c2r-c-region}",
				"{c2r-c-country}",
				"{c2r-c-zipcode}",

				"{c2r-c-social-hidden}",

				"{c2r-c-fb-hidden}",
				"{c2r-c-fb}",

				"{c2r-c-g+-hidden}",
				"{c2r-c-g+}",

				"{c2r-c-pi-hidden}",
				"{c2r-c-pi}",

				"{c2r-c-yt-hidden}",
				"{c2r-c-yt}",

				"{c2r-c-tw-hidden}",
				"{c2r-c-tw}",

				"{c2r-c-in-hidden}",
				"{c2r-c-in}",

				"{c2r-id}",

				"{c2r-color}"
			],
			[
				$header,
				$footer,

				$bg[0]["file"],

				$photo[0]["file"],

				$vcard["name"],
				$vcard["employ"],

				(empty($vcard["phone"]) && empty($vcard["skype"]) && empty($vcard["email"])) ? "hidden" : null,

				(empty($vcard["phone"])) ? "hidden" : null,
				$vcard["phone"],

				(empty($vcard["skype"])) ? "hidden" : null,
				$vcard["skype"],

				(empty($vcard["viber"])) ? "hidden" : null,
				$vcard["viber"],

				(empty($vcard["whatsapp"])) ? "hidden" : null,
				$vcard["whatsapp"],

				(empty($vcard["email"])) ? "hidden" : null,
				$vcard["email"],

				(empty($vcard["fb"]) && empty($vcard["g"]) && empty($vcard["pi"]) && empty($vcard["yt"]) && empty($vcard["tw"])) ? "hidden" : null,

				(empty($vcard["fb"])) ? "hidden" : null,
				$vcard["fb"],

				(empty($vcard["g"])) ? "hidden" : null,
				$vcard["g"],

				(empty($vcard["pi"])) ? "hidden" : null,
				$vcard["pi"],

				(empty($vcard["yt"])) ? "hidden" : null,
				$vcard["yt"],

				(empty($vcard["tw"])) ? "hidden" : null,
				$vcard["tw"],

				(empty($vcard["in"])) ? "hidden" : null,
				$vcard["in"],

				$logo[0]["file"],

				$vcard["c_name"],
				$vcard["c_area"],

				(empty($vcard["c_phone"]) && empty($vcard["c_skype"]) && empty($vcard["c_email"])) ? "hidden" : null,

				(empty($vcard["c_phone"])) ? "hidden" : null,
				$vcard["c_phone"],

				(empty($vcard["c_fax"])) ? "hidden" : null,
				$vcard["c_fax"],

				(empty($vcard["c_skype"])) ? "hidden" : null,
				$vcard["c_skype"],

				(empty($vcard["c_email"])) ? "hidden" : null,
				$vcard["c_email"],

				(empty($vcard["c_gps"]) && empty($vcard["c_street"])) ? "hidden" : null,

				(empty($vcard["c_gps"])) ? "hidden" : null,
				$vcard["c_gps"],

				(empty($vcard["c_website"])) ? "hidden" : null,
				$vcard["c_website"],

				(empty($vcard["c_street"])) ? "hidden" : null,

				$vcard["c_street"],
				$vcard["c_city"],
				$vcard["c_region"],
				$vcard["c_country"],
				$vcard["c_zipcode"],

				(empty($vcard["c_fb"]) && empty($vcard["c_g"]) && empty($vcard["c_pi"]) && empty($vcard["c_yt"]) && empty($vcard["c_tw"])) ? "hidden" : null,

				(empty($vcard["c_fb"])) ? "hidden" : null,
				$vcard["c_fb"],

				(empty($vcard["c_g"])) ? "hidden" : null,
				$vcard["c_g"],

				(empty($vcard["c_pi"])) ? "hidden" : null,
				$vcard["c_pi"],

				(empty($vcard["c_yt"])) ? "hidden" : null,
				$vcard["c_yt"],

				(empty($vcard["c_tw"])) ? "hidden" : null,
				$vcard["c_tw"],

				(empty($vcard["c_in"])) ? "hidden" : null,
				$vcard["c_in"],

				$vcard["id"],

				$article["code"]
			],
			$page_template
		);
	}
} else {
	$item = file_get_contents("templates-e/home/line.html");
	$bg = getImgsFilter (1, "article", ["bg"]);
	$list = null;

	$query = sprintf(
		"SELECT * FROM %s_vcard WHERE published = '%s' ORDER BY %s",
		$configuration["mysql-prefix"], true, "name ASC"
	);
	$source = $mysqli->query($query);

	while ($data = $source->fetch_assoc()) {
		$img = getImgsFilter($data["id"], "vcard", ["photo"]);

		$list .= str_replace(
			[
				"{c2r-page}",
				"{c2r-name}",
				"{c2r-img}"
			],
			[
				$data["id"]."-".str_replace(" ", "-", strtolower($data["name"])),
				$data["name"],
				$img[0]["file"]
			],
			$item
		);
	}

	$template = str_replace(
		[
			"{c2r-header}",
			"{c2r-footer}",

			"{c2r-bg}",

			"{c2r-list}"
		],
		[
			$header,
			$footer,

			$bg[0]["file"],

			$list
		],
		file_get_contents("templates/home-list.html")
	);
}
