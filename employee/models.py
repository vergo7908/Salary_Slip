from django.db import models

class Employee(models.Model):  
    month_year = models.CharField(max_length=500)
    name = models.CharField(max_length=500)
    empId = models.CharField(max_length=500)
    joinDate = models.DateField(blank = True,null=True)
    bankName = models.CharField(max_length=500)
    accountNo = models.CharField(max_length=500)
    ifsc = models.CharField(max_length=500)
    panNo = models.CharField(max_length=500)
    department = models.CharField(max_length=500)
    months_of_days = models.IntegerField()
    designation = models.CharField(max_length=500)
    arrearDays = models.CharField(max_length=500)
    location = models.CharField(max_length=500)
    Over_Time = models.CharField(max_length=500)
    daysPaid = models.CharField(max_length=500)
    daysLWP = models.CharField(max_length=500)
    basic = models.DecimalField(max_digits=10, decimal_places=2)
    hra = models.DecimalField(max_digits=10, decimal_places=2)
    other = models.DecimalField(max_digits=10, decimal_places=2)
    basicSalary = models.DecimalField(max_digits=10, decimal_places=2)
    ecm_hra = models.DecimalField(max_digits=10, decimal_places=2)
    ecm_other = models.DecimalField(max_digits=10, decimal_places=2)
    incentive = models.DecimalField(max_digits=10, decimal_places=2)
    pf = models.DecimalField(max_digits=10, decimal_places=2)
    esi = models.DecimalField(max_digits=10, decimal_places=2)
    tds = models.DecimalField(max_digits=10, decimal_places=2)


    class Meta:  
        db_table = "employee" 




 
