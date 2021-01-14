##Login Details
gaurav.singh@antechindia.com
qwerty@1234

## Notes on Performance Optimization.

This application is heavily based on server side rendering. Unfortunatley, posts with normal usage have underlying objects that do queries extreemly ineffieciently. For example:

    profile.php

A user's profile with a timeline will load 10 posts. In doing so, each posts will load a subset of IDs, loop through each ID, make a select query, make a validation query inside of that, and go through 100-200 lines of arbitrary if-else checking. This causes a profile page of normal usage to make in the ballpark or 50 different queries for 1 single read-only page view.

The underlying SQL is not based on models and is too difficult to re-write in full in a short time frame, but should be eventually.

## AJAX Porting of Time-Consuming Reads

To compromise, the 10-12 second page-load described by `profile.php` has been (after through benchmarking and identification of the most time consuming calls) reduced to about 0.5 seconds. Once the main page is loaded, asynchrenous javascript allows the other components to load (such as posts, friends, feeds, etc) allowing us to squish that loading time overlapped.

## AJAX Ported Ingress PHP Files and Associated Template File Naming Conventions

These custom AJAX calls are custom, messy, and coppied from the existing template framework. Because the existing template framework is so tighly coupled with eachother as well as queries and fieldnames, I've found it better to just copy the template for my use case. I've also found it better to do this as well for php files being called via AJAX. For example:

`profile.php` has at least 3 time-consuming sub portions:

1. Loading friends
2. Loading posts
3. Loading "more" posts

In normal sittuations, loading posts and loading more posts might have been doable by the same script, but I have not been able to port AJAX calls wrapping infinitie scrolling template portions without loosing the offset information, so I re-did it myself. In doing so, I tried to make these new php AJAX routes as easy to discover as possible.

For `profile.php`, I've created (in the same root directory) `profile.ajax.fiends.php`, `profile.ajax.posts.php`, and `profile.ajax.more_posts.php`. Eventually these weill be ported to microserices and benchmarked accordingly through an API. As for now, I indend on having the same convention for all "AJAX Ported" components of existing routes. In addition, those new PHP files coorespond with similarly named template. Because they are not the existing templates, and are new, they are named as such (specifically `NEW_profile.ajax.friends.tmpl`, `NEW_profile.ajax.posts.tpl`, and `NEW_profile.ajax.more_posts.tpl`.

## Benchmarking Code

You may notice that I will leave benchmarking code laying around. **DO NOT REMOVE IT**

