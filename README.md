#Project by Yii2 Base Framework

## Init
 1. git clone https://github.com/LexusAlex/basic.git
 2. git remote add upstream https://github.com/LexusAlex/basic.git
 3. composer update
 4. composer global require "fxp/composer-asset-plugin:~1.1.1"
 5. create issue on Github
 6. git fetch upstream
 7. git checkout upstream/master
 8. git checkout -b 999-name-of-your-branch-goes-here
 9. write code,modul tests
 10. update CHANGELOG file ex Bug #6876: Fixed RBAC migration MSSQL cascade problem (thejahweh)
 11. git add files..
 12. git commit -m "A brief description of this change which fixes #999 goes here"
 13. git pull upstream master
 14. git push -u origin 999-name-of-your-branch-goes-here
 15. open pull request
 
 ##Clear
 1. git checkout master
 2. git branch -D 999-name-of-your-branch-goes-here
 3. git push origin --delete 999-name-of-your-branch-goes-here
 
 ##Server
 1. Copy config file from local to dir server
 
## Git
 * branch master only stable code
 * other branch main develop
 * fix bug create new branch
 
## Git commands
 * git checkout -- file  - Revert file to last commit
 * git checkout master - Switched to branch 'master'
 * git checkout -b new_b or git branch new_b - Create new branch on project
 * git reset --soft B (- A - B - C (master)) - HEAD to B , changes C in index
 * git reset --mixed B = git reset (- A - B - C (master)) - HEAD to B , changes C not in index
 * git reset --hard B (- A - B - C (master)) - HEAD to B , changes C delete from index and delete files
 
    1. Change index --mixed --hard
    2. Change files in work directory --hard
 * git remote -v - View All remote branch
 * git revert HEAD  - Rollback last commit
 * git cherry-pick C2 - Give commits from other branch
 * git rebase master  - Sync main branch
 * git merge master - All history commits
     