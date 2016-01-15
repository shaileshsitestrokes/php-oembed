This little PHP library provides a roughly OEmbed - http://oembed.com - compatible interface for javascript and PHP clients to consume. It can deal with OEmbed providers by acting as a proxy, and it has a plugin system where you can add your own embed-providers.

Embeds are useful when you don't want a whole page to load something (namely, a resource), you just want the content itself: being a youtube video, a flickr photo, a calendar entry, or anything else.

A [YouTube](http://youtube.com) plugin is boundled.

Demo:

http://aadaam.dev.ischmerosok.hu/oembed/Embed.php?url=www.youtube.com/watch?v=8SUtE_HF-88&format=xml

![http://aadaam.dev.ischmerosok.hu/oembed/oembed_demo.png](http://aadaam.dev.ischmerosok.hu/oembed/oembed_demo.png)

http://aadaam.dev.ischmerosok.hu/oembed/tests/ForumTest.html

Usage:
```
$manager = ProviderManager::getInstance();
$manager->provide($url,$format)
```

Where format is a string and one of:
  * xml
  * json
  * array
  * serialized
  * object

Usage of object is recommended.

There's a template for objects to render HTML direcltly (with my own LazyTemplateEngine which is about 10-20 lines of code, and included :), you can use it like:

```
		$manager = ProviderManager::getInstance();
		$obj=$manager->provide("http://www.youtube.com/watch? v=EQqJSAOOmGI","object");
		$html=$obj->renderClass();
```

You can add more providers in the providers.xml file. A non-OEmbed provider gets his XML node as a SimpleXML element in constructor, and must implement the

  * boolean match(string url) and
  * mixed provide(string url,string format)
functions.

Oh! Requires PHP5 I guess, and uses json\_encode() function...