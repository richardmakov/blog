<?= '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL ?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dc="http://purl.org/dc/elements/1.1/">
    <channel>
        <title>Aviation blog</title>
        <link>http://blog.test</link>
        <description>Aviation blog</description>
        <language>en-us</language>

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{{ $post->name }}]]></title>
                <link>{{ url('posts/'.$post->id) }}</link>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
                <description><![CDATA[{{ $post->extract }}]]></description>
                <enclosure url="{{ url('storage/'.$post->image->url) }}" type="image/jpeg" length="12345" />
                <author><![CDATA[{{ $post->user->name }}]]></author>
                <!-- Otras posibilidades -->
                 <dc:creator><![CDATA[{{ $post->user->name }}]]></dc:creator> 
                 <dc:author><![CDATA[{{ $post->user->name }}]]></dc:author> 
            </item>
        @endforeach
    </channel>
</rss>
