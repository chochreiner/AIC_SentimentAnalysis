<?php

class AllRSSFeeds {
	
	public function getAllRSS() {

		$rssFeeds = array();

		$rssFeeds['News'] = 'http://finance.yahoo.com/news/;_ylt=A0LkuYICnpZQhQYAyAKhuYdG;_ylu=X3oDMTI0ZzNjZmE2BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggVG9wIFN0b3JpZXMEcG9zAzYEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3?format=rss';
		$rssFeeds['Economy, Government & Policy'] = 'http://finance.yahoo.com/news/category-economy-govt-and-policy/rss;_ylt=A0LkuYICnpZQhQYAvAKhuYdG;_ylu=X3oDMTI1bHFtOWR2BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggR2VuZXJhbCBOZXdzBHBvcwM2BHNlYwNNZWRpYVJTU0VkaXRvcmlhbA--;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Legal / Law Matters'] = 'http://finance.yahoo.com/news/category-legal-matters/rss;_ylt=A0LkuYICnpZQhQYAvwKhuYdG;_ylu=X3oDMTI1M2x2OHNuBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggR2VuZXJhbCBOZXdzBHBvcwM5BHNlYwNNZWRpYVJTU0VkaXRvcmlhbA--;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['International'] = 'http://finance.yahoo.com/news/category-economy/rss;_ylt=A0LkuYICnpZQhQYAwgKhuYdG;_ylu=X3oDMTI2cnR0OGtvBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggR2VuZXJhbCBOZXdzBHBvcwMxMgRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Earnings'] = 'http://finance.yahoo.com/news/category-earnings/rss;_ylt=A0LkuYICnpZQhQYAbAKhuYdG;_ylu=X3oDMTI5Z3BlcDZpBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggQ29tcGFueSBGaW5hbmNlcwRwb3MDNgRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['IPOs'] = 'http://finance.yahoo.com/news/category-ipos/rss;_ylt=A0LkuYICnpZQhQYAbwKhuYdG;_ylu=X3oDMTI5N3BzN2tyBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggQ29tcGFueSBGaW5hbmNlcwRwb3MDOQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Upgrades and Downgrades'] = 'http://finance.yahoo.com/news/category-upgrades-and-downgrades/rss;_ylt=A0LkuYICnpZQhQYAcgKhuYdG;_ylu=X3oDMTJhcnR0aDM2BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggQ29tcGFueSBGaW5hbmNlcwRwb3MDMTIEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Private Equity & Hedge Funds'] = 'http://finance.yahoo.com/news/category-pe-and-hedgefunds/rss;_ylt=A0LkuYICnpZQhQYAdQKhuYdG;_ylu=X3oDMTJhMmR1c3YxBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggQ29tcGFueSBGaW5hbmNlcwRwb3MDMTUEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Mergers & Acquisitions'] = 'http://finance.yahoo.com/news/category-m-a/rss;_ylt=A0LkuYICnpZQhQYAeAKhuYdG;_ylu=X3oDMTJhdGw3NTdrBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggQ29tcGFueSBGaW5hbmNlcwRwb3MDMTgEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Venture Capital'] = 'http://finance.yahoo.com/news/category-venture-capital/rss;_ylt=A0LkuYICnpZQhQYAewKhuYdG;_ylu=X3oDMTJhOTRzdDZjBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggQ29tcGFueSBGaW5hbmNlcwRwb3MDMjEEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Personal Finance All'] = 'http://finance.yahoo.com/personal-finance/;_ylt=A0LkuYICnpZQhQYATgKhuYdG;_ylu=X3oDMTFnMjdvYXZmBG1pdANQRiBmb3IgUlNTIEluZGV4BHBvcwM2BHNlYwNNZWRpYVJTU0VkaXRvcmlhbA--;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3?format=rss'; 
		$rssFeeds['Real Estate'] = 'http://finance.yahoo.com/real-estate/;_ylt=A0LkuYICnpZQhQYAUQKhuYdG;_ylu=X3oDMTFnMXBldjE4BG1pdANQRiBmb3IgUlNTIEluZGV4BHBvcwM5BHNlYwNNZWRpYVJTU0VkaXRvcmlhbA--;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3?format=rss';
		$rssFeeds['Career & Education'] = 'http://finance.yahoo.com/career-education/;_ylt=A0LkuYICnpZQhQYAVAKhuYdG;_ylu=X3oDMTFoaWtmdGQ2BG1pdANQRiBmb3IgUlNTIEluZGV4BHBvcwMxMgRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3?format=rss';
		$rssFeeds['Retirement'] = 'http://finance.yahoo.com/retirement/;_ylt=A0LkuYICnpZQhQYAVwKhuYdG;_ylu=X3oDMTFoMWNwNGhvBG1pdANQRiBmb3IgUlNTIEluZGV4BHBvcwMxNQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3?format=rss';
		$rssFeeds['Saving & Spending'] = 'http://finance.yahoo.com/saving-spending/;_ylt=A0LkuYICnpZQhQYAWgKhuYdG;_ylu=X3oDMTFoa3JnbGRhBG1pdANQRiBmb3IgUlNTIEluZGV4BHBvcwMxOARzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3?format=rss';
		$rssFeeds['Lifestyle'] = 'http://finance.yahoo.com/lifestyle/;_ylt=A0LkuYICnpZQhQYAXQKhuYdG;_ylu=X3oDMTFoaHRzOHFhBG1pdANQRiBmb3IgUlNTIEluZGV4BHBvcwMyMQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3?format=rss';
		$rssFeeds['Loans'] = 'http://finance.yahoo.com/loans/;_ylt=A0LkuYICnpZQhQYAYAKhuYdG;_ylu=X3oDMTFoOG5tc3EwBG1pdANQRiBmb3IgUlNTIEluZGV4BHBvcwMyNARzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3?format=rss';
		$rssFeeds['Insurance'] = 'http://finance.yahoo.com/insurance/;_ylt=A0LkuYICnpZQhQYAYwKhuYdG;_ylu=X3oDMTFoYmFhdWJyBG1pdANQRiBmb3IgUlNTIEluZGV4BHBvcwMyNwRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3?format=rss';
		$rssFeeds['Taxes'] = 'http://finance.yahoo.com/taxes/;_ylt=A0LkuYICnpZQhQYAZgKhuYdG;_ylu=X3oDMTFoYjZ1dGthBG1pdANQRiBmb3IgUlNTIEluZGV4BHBvcwMzMARzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3?format=rss';
		$rssFeeds['Basic Materials'] = 'http://finance.yahoo.com/news/sector-basic-materials/rss;_ylt=A0LkuYICnpZQhQYAnAKhuYdG;_ylu=X3oDMTIwaHBrZnVxBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggU2VjdG9ycwRwb3MDNgRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Industrial Goods'] = 'http://finance.yahoo.com/news/sector-industrial-goods/rss;_ylt=A0LkuYICnpZQhQYAnwKhuYdG;_ylu=X3oDMTIwM2NpbzQwBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggU2VjdG9ycwRwb3MDOQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Conglomerates'] = 'http://finance.yahoo.com/news/sector-conglomerate/rss;_ylt=A0LkuYICnpZQhQYAogKhuYdG;_ylu=X3oDMTIxMGs5OWJjBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggU2VjdG9ycwRwb3MDMTIEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Services'] = 'http://finance.yahoo.com/news/sector-services/rss;_ylt=A0LkuYICnpZQhQYApQKhuYdG;_ylu=X3oDMTIxYWVhbG0xBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggU2VjdG9ycwRwb3MDMTUEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Consumer Goods'] = 'http://finance.yahoo.com/news/sector-consumer-goods/rss;_ylt=A0LkuYICnpZQhQYAqAKhuYdG;_ylu=X3oDMTIxamNqb2htBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggU2VjdG9ycwRwb3MDMTgEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Technology'] = 'http://finance.yahoo.com/news/sector-technology/rss;_ylt=A0LkuYICnpZQhQYAqwKhuYdG;_ylu=X3oDMTIxbGJnMjFpBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggU2VjdG9ycwRwb3MDMjEEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Financial'] = 'http://finance.yahoo.com/news/sector-financial/rss;_ylt=A0LkuYICnpZQhQYArgKhuYdG;_ylu=X3oDMTIxc3E2NjQzBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggU2VjdG9ycwRwb3MDMjQEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Healthcare'] = 'http://finance.yahoo.com/news/sector-healthcare/rss;_ylt=A0LkuYICnpZQhQYAsQKhuYdG;_ylu=X3oDMTIxcW5najZiBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggU2VjdG9ycwRwb3MDMjcEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Utilities'] = 'http://finance.yahoo.com/news/sector-utilities/rss;_ylt=A0LkuYICnpZQhQYAtAKhuYdG;_ylu=X3oDMTIxM25oZDg2BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggU2VjdG9ycwRwb3MDMzAEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Stocks'] = 'http://finance.yahoo.com/news/category-stocks/rss;_ylt=A0LkuYICnpZQhQYAgQKhuYdG;_ylu=X3oDMTIzZjBwYjJwBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggVVMgTWFya2V0cwRwb3MDNgRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Options'] = 'http://finance.yahoo.com/news/category-options/rss;_ylt=A0LkuYICnpZQhQYAhAKhuYdG;_ylu=X3oDMTIzaTFwNGExBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggVVMgTWFya2V0cwRwb3MDOQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Bonds'] = 'http://finance.yahoo.com/news/category-bonds/rss;_ylt=A0LkuYICnpZQhQYAhwKhuYdG;_ylu=X3oDMTI0ODJiOTRhBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggVVMgTWFya2V0cwRwb3MDMTIEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['ETFs'] = 'http://finance.yahoo.com/news/category-etfs/rss;_ylt=A0LkuYICnpZQhQYAigKhuYdG;_ylu=X3oDMTI0bDJxOGI1BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggVVMgTWFya2V0cwRwb3MDMTUEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Commodities'] = 'http://finance.yahoo.com/news/category-commodities/rss;_ylt=A0LkuYICnpZQhQYAjQKhuYdG;_ylu=X3oDMTI0M29vYW91BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggVVMgTWFya2V0cwRwb3MDMTgEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Mutual Funds'] = 'http://finance.yahoo.com/news/category-mutual-funds/rss;_ylt=A0LkuYICnpZQhQYAkAKhuYdG;_ylu=X3oDMTI0ZW5hNGxjBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggVVMgTWFya2V0cwRwb3MDMjEEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Currencies'] = 'http://finance.yahoo.com/news/category-currencies/rss;_ylt=A0LkuYICnpZQhQYAkwKhuYdG;_ylu=X3oDMTI0ODBybzhmBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggVVMgTWFya2V0cwRwb3MDMjQEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Investing Ideas & Strategies'] = 'http://finance.yahoo.com/news/category-ideas-and-strategies/rss;_ylt=A0LkuYICnpZQhQYAlgKhuYdG;_ylu=X3oDMTI0dTRkanY1BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggVVMgTWFya2V0cwRwb3MDMjcEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['AllThingsD'] = 'http://finance.yahoo.com/news/provider-allthingsd/rss;_ylt=A0LkuYICnpZQhQYAKAOhuYdG;_ylu=X3oDMTIyMWZpYW9mBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM2BHNlYwNNZWRpYVJTU0VkaXRvcmlhbA--;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['AP'] = 'http://finance.yahoo.com/news/provider-ap/rss;_ylt=A0LkuYICnpZQhQYAKwOhuYdG;_ylu=X3oDMTIyMzdiNGloBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM5BHNlYwNNZWRpYVJTU0VkaXRvcmlhbA--;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Bankrate.com'] = 'http://finance.yahoo.com/news/provider-bankrate/rss;_ylt=A0LkuYICnpZQhQYALgOhuYdG;_ylu=X3oDMTIzMTU2bGFxBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwMxMgRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Barrons.com'] = 'http://finance.yahoo.com/news/provider-barrons/rss;_ylt=A0LkuYICnpZQhQYAMQOhuYdG;_ylu=X3oDMTIzcWo3bmMyBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwMxNQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['bizjournals.com'] = 'http://finance.yahoo.com/news/provider-bizjournals/rss;_ylt=A0LkuYICnpZQhQYANAOhuYdG;_ylu=X3oDMTIzbDBybjVxBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwMxOARzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Bloomberg'] = 'http://finance.yahoo.com/news/provider-bloomberg/rss;_ylt=A0LkuYICnpZQhQYANwOhuYdG;_ylu=X3oDMTIzbmxhczYzBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwMyMQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Business Insider'] = 'http://finance.yahoo.com/news/provider-businessinsider/rss;_ylt=A0LkuYICnpZQhQYAOgOhuYdG;_ylu=X3oDMTIzNmhhNjFyBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwMyNARzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Business Wire'] = 'http://finance.yahoo.com/news/provider-businesswire/rss;_ylt=A0LkuYICnpZQhQYAPQOhuYdG;_ylu=X3oDMTIzaDkxc3U5BG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwMyNwRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Business Week'] = 'http://finance.yahoo.com/news/provider-businessweek/rss;_ylt=A0LkuYICnpZQhQYAQAOhuYdG;_ylu=X3oDMTIzZGRibHE2BG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwMzMARzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['CNBC'] = 'http://finance.yahoo.com/news/provider-cnbc/rss;_ylt=A0LkuYICnpZQhQYAQwOhuYdG;_ylu=X3oDMTIzaG05YjY5BG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwMzMwRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['CNNMoney.com'] = 'http://finance.yahoo.com/news/provider-cnnmoney/rss;_ylt=A0LkuYICnpZQhQYARgOhuYdG;_ylu=X3oDMTIzYm1sN2N1BG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwMzNgRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['CNW Group'] = 'http://finance.yahoo.com/news/provider-cnwgroup/rss;_ylt=A0LkuYICnpZQhQYASQOhuYdG;_ylu=X3oDMTIzM2czZmozBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwMzOQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Consumer reports'] = 'http://finance.yahoo.com/news/provider-consumer-reports/rss;_ylt=A0LkuYICnpZQhQYATAOhuYdG;_ylu=X3oDMTIzbWdrOW9lBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM0MgRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['CreditCards.com'] = 'http://finance.yahoo.com/news/provider-credit-cards/rss;_ylt=A0LkuYICnpZQhQYATwOhuYdG;_ylu=X3oDMTIzajJwdWFhBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM0NQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['DailyFX'] = 'http://finance.yahoo.com/news/provider-dailyfx/rss;_ylt=A0LkuYICnpZQhQYAUgOhuYdG;_ylu=X3oDMTIzYjYzMnFxBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM0OARzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Entrepreneur'] = 'http://finance.yahoo.com/news/provider-entrepreneur/rss;_ylt=A0LkuYICnpZQhQYAVQOhuYdG;_ylu=X3oDMTIzc3E0MTFqBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM1MQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['ETF Database'] = 'http://finance.yahoo.com/news/provider-etf-database/rss;_ylt=A0LkuYICnpZQhQYAWAOhuYdG;_ylu=X3oDMTIzNGRsY2hmBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM1NARzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['ETF Trends'] = 'http://finance.yahoo.com/news/provider-etf-trends/rss;_ylt=A0LkuYICnpZQhQYAWwOhuYdG;_ylu=X3oDMTIzMGtydjRmBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM1NwRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['ETFguide'] = 'http://finance.yahoo.com/news/provider-etfguide/rss;_ylt=A0LkuYICnpZQhQYAXgOhuYdG;_ylu=X3oDMTIzNTExODZxBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM2MARzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['ETFZone'] = 'http://finance.yahoo.com/news/provider-etfzone/rss;_ylt=A0LkuYICnpZQhQYAYQOhuYdG;_ylu=X3oDMTIzODltaGcwBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM2MwRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Financial Times'] = 'http://finance.yahoo.com/news/provider-financial-times/rss;_ylt=A0LkuYICnpZQhQYAZAOhuYdG;_ylu=X3oDMTIzNHQ2bzZsBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM2NgRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Forbes'] = 'http://finance.yahoo.com/news/provider-forbes/rss;_ylt=A0LkuYICnpZQhQYAZwOhuYdG;_ylu=X3oDMTIzdmMzcmFnBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM2OQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Fortune'] = 'http://finance.yahoo.com/news/provider-fortune/rss;_ylt=A0LkuYICnpZQhQYAagOhuYdG;_ylu=X3oDMTIzaWVnMzR1BG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM3MgRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Fox Business'] = 'http://finance.yahoo.com/news/provider-foxbusiness/rss;_ylt=A0LkuYICnpZQhQYAbQOhuYdG;_ylu=X3oDMTIzNzZjc2lyBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM3NQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['GFT Forex'] = 'http://finance.yahoo.com/news/provider-gft-forex/rss;_ylt=A0LkuYICnpZQhQYAcAOhuYdG;_ylu=X3oDMTIzdmZzOHY4BG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM3OARzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['GlobeNewswire'] = 'http://finance.yahoo.com/news/provider-globenewswire/rss;_ylt=A0LkuYICnpZQhQYAcwOhuYdG;_ylu=X3oDMTIzcjE4N2w2BG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM4MQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['IndieResearch'] = 'http://finance.yahoo.com/news/provider-indieresearch/rss;_ylt=A0LkuYICnpZQhQYAdgOhuYdG;_ylu=X3oDMTIzaTVqam5wBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM4NARzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['IndexUniverse.com'] = 'http://finance.yahoo.com/news/provider-indexuniverse/rss;_ylt=A0LkuYICnpZQhQYAeQOhuYdG;_ylu=X3oDMTIzMGRnMXExBG1pdANTdWJzY2liZSBhbmQgU2l0ZSBJbmRleCBQcm92aWRlcnMxBHBvcwM4NwRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Investopedia'] = 'http://finance.yahoo.com/news/provider-investopedia/rss;_ylt=A0LkuYICnpZQhQYA0QKhuYdG;_ylu=X3oDMTIzamY1OHZlBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNgRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Investor\'s Business Daily'] = 'http://finance.yahoo.com/news/provider-investors-business-daily/rss;_ylt=A0LkuYICnpZQhQYA1AKhuYdG;_ylu=X3oDMTIzNnE3dHZuBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDOQRzZWMDTWVkaWFSU1NFZGl0b3JpYWw-;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Kiplinger'] = 'http://finance.yahoo.com/news/provider-kiplinger/rss;_ylt=A0LkuYICnpZQhQYA1wKhuYdG;_ylu=X3oDMTI0MWVqMXA5BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDMTIEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['MarketWatch'] = 'http://finance.yahoo.com/news/provider-marketwatch/rss;_ylt=A0LkuYICnpZQhQYA2gKhuYdG;_ylu=X3oDMTI0OTFxZWN0BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDMTUEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Marketwire'] = 'http://finance.yahoo.com/news/provider-marketwire/rss;_ylt=A0LkuYICnpZQhQYA3QKhuYdG;_ylu=X3oDMTI0MHN0dGI3BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDMTgEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Minyanville'] = 'http://finance.yahoo.com/news/provider-minyanville/rss;_ylt=A0LkuYICnpZQhQYA4AKhuYdG;_ylu=X3oDMTI0YnRma245BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDMjEEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Money'] = 'http://finance.yahoo.com/news/provider-money/rss;_ylt=A0LkuYICnpZQhQYA4wKhuYdG;_ylu=X3oDMTI0dnM2bXRxBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDMjQEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Morningstar'] = 'http://finance.yahoo.com/news/provider-morningstar/rss;_ylt=A0LkuYICnpZQhQYA5gKhuYdG;_ylu=X3oDMTI0YTMxYXMzBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDMjcEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Motley Fool'] = 'http://finance.yahoo.com/news/provider-motleyfool/rss;_ylt=A0LkuYICnpZQhQYA6QKhuYdG;_ylu=X3oDMTI0MTZwdDZ0BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDMzAEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['New York Times'] = 'http://finance.yahoo.com/news/provider-new-york-times/rss;_ylt=A0LkuYICnpZQhQYA7AKhuYdG;_ylu=X3oDMTI0Y3NpYWxxBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDMzMEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Optionetics'] = 'http://finance.yahoo.com/news/provider-optionetics/rss;_ylt=A0LkuYICnpZQhQYA7wKhuYdG;_ylu=X3oDMTI0ZjJ2ZzhqBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDMzYEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['optionMONSTER'] = 'http://finance.yahoo.com/news/provider-optionmonster/rss;_ylt=A0LkuYICnpZQhQYA8gKhuYdG;_ylu=X3oDMTI0YXE3YjloBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDMzkEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['paidContent.org'] = 'http://finance.yahoo.com/news/provider-paidcontent/rss;_ylt=A0LkuYICnpZQhQYA9QKhuYdG;_ylu=X3oDMTI0MnVocWFkBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNDIEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['PR Newswire'] = 'http://finance.yahoo.com/news/provider-prnewswire/rss;_ylt=A0LkuYICnpZQhQYA.AKhuYdG;_ylu=X3oDMTI0b2RwMTJvBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNDUEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Reuters'] = 'http://finance.yahoo.com/news/provider-reuters/rss;_ylt=A0LkuYICnpZQhQYA.wKhuYdG;_ylu=X3oDMTI0YWM1NGVoBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNDgEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Seeking Alpha'] = 'http://finance.yahoo.com/news/provider-seekingalpha/rss;_ylt=A0LkuYICnpZQhQYA_gKhuYdG;_ylu=X3oDMTI0dDR2OTQ2BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNTEEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['SmallCapInvestor.com'] = 'http://finance.yahoo.com/news/provider-small-cap-investor/rss;_ylt=A0LkuYICnpZQhQYAAQOhuYdG;_ylu=X3oDMTI0cjJkamdpBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNTQEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['SmartMoney'] = 'http://finance.yahoo.com/news/provider-smartmoney/rss;_ylt=A0LkuYICnpZQhQYABAOhuYdG;_ylu=X3oDMTI0bDNrM3BlBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNTcEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['The Atlantic'] = 'http://finance.yahoo.com/news/provider-the-atlantic/rss;_ylt=A0LkuYICnpZQhQYABwOhuYdG;_ylu=X3oDMTI0MXQ1a2F0BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNjAEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['The Wall Street Journal'] = 'http://finance.yahoo.com/news/provider-the-wall-street-journal/rss;_ylt=A0LkuYICnpZQhQYACgOhuYdG;_ylu=X3oDMTI0Z2hjaTNuBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNjMEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['theflyonthewall.com'] = 'http://finance.yahoo.com/news/provider-flyonthewall/rss;_ylt=A0LkuYICnpZQhQYADQOhuYdG;_ylu=X3oDMTI0aWo4bnMxBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNjYEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['TheStreet.com'] = 'http://finance.yahoo.com/news/provider-thestreet/rss;_ylt=A0LkuYICnpZQhQYAEAOhuYdG;_ylu=X3oDMTI0dHM1cDV1BG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNjkEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Thomson Reuters ONE'] = 'http://finance.yahoo.com/news/provider-thomsonreuters/rss;_ylt=A0LkuYICnpZQhQYAEwOhuYdG;_ylu=X3oDMTI0MmdzOG9zBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNzIEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['US News & World Report'] = 'http://finance.yahoo.com/news/provider-usnews/rss;_ylt=A0LkuYICnpZQhQYAFgOhuYdG;_ylu=X3oDMTI0bmdyZ3NmBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNzUEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Wall St. Cheat Sheet'] = 'http://finance.yahoo.com/news/provider-wall-st-cheat-sheet/rss;_ylt=A0LkuYICnpZQhQYAGQOhuYdG;_ylu=X3oDMTI0cjE3bXRjBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDNzgEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Wall Street Transcript'] = 'http://finance.yahoo.com/news/provider-wall-street-transcript/rss;_ylt=A0LkuYICnpZQhQYAHAOhuYdG;_ylu=X3oDMTI0NWNlZWljBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDODEEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Yahoo! Contributor Network'] = 'http://finance.yahoo.com/news/provider-yahoo-contributor-network/rss;_ylt=A0LkuYICnpZQhQYAHwOhuYdG;_ylu=X3oDMTI0MHU0aGFrBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDODQEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
		$rssFeeds['Zacks'] = 'http://finance.yahoo.com/news/provider-zacks/rss;_ylt=A0LkuYICnpZQhQYAIgOhuYdG;_ylu=X3oDMTI0YXNzNmdwBG1pdANTdWJzY3JpYmUgYW5kIFNpdGUgSW5kZXggUHJvdmlkZXIgMgRwb3MDODcEc2VjA01lZGlhUlNTRWRpdG9yaWFs;_ylg=X3oDMTFzdHZoMTdhBGludGwDdXMEbGFuZwNlbi11cwRwc3RhaWQDBHBzdGNhdANuZXdzfHByb3ZpZGVycwRwdANzZWN0aW9ucw--;_ylv=3';
				
		return $rssFeeds;
	}

}
?>
