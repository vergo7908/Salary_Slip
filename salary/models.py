from django.db import models

class Salary(models.Model):   
    username = models.CharField(max_length=10)  
    password = models.CharField(max_length=10)

    class Meta:  
        db_table = "salary" 