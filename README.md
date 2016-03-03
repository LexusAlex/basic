#Project by Yii2 Base Framework

## Init
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
     