# magento2 cronjob delete orders that are 24hrs old
Module CronModule_Cronjob allows you to:

cancel old orders that taking space in your system. You can customize the schedule time of your cron job

# Installing
Download a ZIP version of the module and unpack it into your project into

```
app/code/CronModule/Cronjob

```

###### Install the module
Run this command

```
php bin/magento module:enable CronModule_Cronjob
php bin/magento setup:upgrade
```

# Features
<li>Delete all orders that are 24 hours old </li>
<li> Schedule to run cron midnight </li>
