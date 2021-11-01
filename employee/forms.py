from django import forms  
from .models import Employee
 


class DateInput(forms.DateInput):
    input_type = 'date'


class EmployeeForm(forms.ModelForm):  
    class Meta:  
        model = Employee  
        fields = "__all__" 

        widgets = {
            'joinDate': DateInput(),
            'leftDate': DateInput(), 
            'month_year': DateInput(),   
        } 


# from .models import Salary  
# class SalaryForm(forms.ModelForm):  
#     class Meta:  
#         model = Salary  
#         fields = "__all__"  