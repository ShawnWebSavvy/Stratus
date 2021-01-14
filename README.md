##Login Details
gaurav.singh@antechindia.com
qwerty@1234

## Notes on migrating from a previous repo:

Let's say you just add the new official Stratus repo and still have the old "origin"
by doing something like `git remote add stratus git@github.com:Stratus-Global/stratus.git`

You should have something like this:

        $ git remote -v
        origin  git@github.com:kamalstratus/stratus.git (fetch)
        origin  git@github.com:kamalstratus/stratus.git (push)
        stratus git@github.com:kamalstratus/stratus.git (fetch)
        stratus git@github.com:kamalstratus/stratus.git (push)
        
It may be easier to just remove all the remotes and set this repo as your new origin

        $ git remote rm origin
        $ git remote rm stratus
        
Add the new repo as your new "origin"

        $ git remote -v
        $ git remote add origin git@github.com:Stratus-Global/stratus.git
        
Make sure it's there

        $ git remote -v
        origin  git@github.com:kamalstratus/stratus.git (fetch)
        origin  git@github.com:kamalstratus/stratus.git (push)
        
Check your branches, you might only have the master branch.

        $ git branch -a
        * master
        
Fetch all the other branches

        $ git fetch origin
        From github.com:kamalstratus/stratus
         * [new branch]      master           -> origin/master
         * [new branch]      performanceIssue -> origin/performanceIssue
         
Make sure they're there

        $ git branch -a
        * master
          remotes/origin/master
          remotes/origin/performanceIssue
          
Now you can check out your branch, the issue branch, or any other branch

        $ git checkout performanceIssue
        Branch 'performanceIssue' set up to track remote branch 'performanceIssue' from 'origin'.
        Switched to a new branch 'performanceIssue'
        
Make sure you're on a new branch

        $ git branch
          master
        * performanceIssue
