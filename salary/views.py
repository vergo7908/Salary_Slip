from django.shortcuts import render,redirect
from .forms import SalaryForm  
# from .models import Employee 
from .models import Salary
from django.contrib import messages
from django.contrib.auth import authenticate, login

# Create your views here.


def login(request):
    # if request.method == "POST":  
    #     form = SalaryForm(request.POST)  
    #     if form.is_valid():  
    #         try:  
    #             form.save()  
    #             return redirect('/index')  
    #         except:  
    #             pass  
    # else:  
    #     form = SalaryForm()  
    # return render(request,'login.html',{'form':form})   


    if request.method == 'POST':
        form = SalaryForm(request.POST)  
        username = request.POST['username']
        password = request.POST['password']
         
        try:
            salary = Salary.objects.get(username = username,password=password)
            # messages.success(request, "successfully login")
            print(salary.username,salary.password)      
           
        except Salary.DoesNotExist:
            salary = None
            # messages.error(request, "Invalid username or password")

        if salary is not None:
            return redirect('/index')                                           
        else:
            return render(request, 'login.html')

    return render(request,'login.html')







    # if request.method == 'POST':
    #     form = EmployeeForm(request.POST)  
    #     empId = request.POST['empId']

    #     try:
    #         employee = Employee.objects.get(empId=empId)        
    #         # messages.success(request, "successfully login")
    #     except Employee.DoesNotExist:
    #         employee = None
    #         messages.error(request, "Invalid Employee ID")
         
    #     if employee is not None:

    #         return redirect('/view')                                           
    #     else:
    #         return render(request, 'show.html')
