from django.shortcuts import render, redirect 
from .forms import EmployeeForm  
from .models import Employee 
from django.template.loader import get_template
from .utils import render_to_pdf 
from num2words import num2words 
import json
from django.http import HttpResponse
from django.contrib import messages
# Create your views here.

def index(request):
    return render(request,"index.html")

def logout(request):
    return render(request,"login.html")

def salary_slip(request):  
    if request.method == "POST": 
        form = EmployeeForm(request.POST)  
        if form.is_valid():  
            try:  
                form.save()  
 
                return redirect('/view')  
            except:  
                pass  
    else:  
        form = EmployeeForm()  
    return render(request,'salary_slip.html',{'form':form})  


    
# def show_all(request):     
#     employees = Employee.objects.all()  
#     return render(request,"show_all.html",{'employees':employees}) 



def view(request):   

        if request.method == 'POST':
            form = EmployeeForm(request.POST)  
            empId = request.POST['empId']
            month_year = request.POST['month_year']

            try:
                employee = Employee.objects.get(empId=empId,month_year=month_year) 
                request.session['empId'] = empId
                    
            except Employee.DoesNotExist:
                employee = None
                # messages.error(request, "Invalid Employee ID")

                
            if employee is not None:
                return redirect('/show')                                           
            else:
                return render(request, 'view.html')

        return render(request,"view.html") 



def show(request):
    if request.session.has_key('empId'):
        if request.method == "GET": 
            empId = request.session['empId']
            employee = Employee.objects.get(empId = empId) 
              
            return render(request, 'show.html',{'employee' : employee})            
    else:
        return render(request, 'login.html')

      
# def show(request):
#     employees = Employee.objects.all()  
#     return render(request,'show.html', {'employees':employees})  




def edit(request, id):  

    employee = Employee.objects.get(id=id)  
    return render(request,'edit.html', {'employee':employee})  

def update(request, id):  
    employee = Employee.objects.get(id=id)  
    form = EmployeeForm(request.POST, instance = employee)  
    if form.is_valid():  
        form.save()  
        return redirect("/view")  
    return render(request, 'edit.html', {'employee': employee})  

def destroy(request, id):  
    employee = Employee.objects.get(id=id)  
    employee.delete()  
    return redirect("/view")  


def generate_pdf(request, id):
    employee = Employee.objects.get(id=id)

    if request.method == "GET":
        net_pay  = float(employee.basicSalary + employee.ecm_hra + employee.ecm_other + employee.incentive) - float(employee.pf + employee.esi + employee.tds)
    

    data_ =  {
            
                    'month_year': employee.month_year,
                    'name': employee.name,                    
                    'empId': employee.empId,
                    'joinDate':  employee.joinDate,
                    'bankName': employee.bankName,
                    'accountNo':  employee.accountNo,
                    'ifsc': employee.ifsc,
                    'panNo':  employee.panNo ,
                    'department':  employee.department ,
                    'months_of_days':  employee.months_of_days ,
                    'designation':  employee.designation ,
                    'arrearDays':  employee.arrearDays ,
                    'location':  employee.location ,
                    'Over_Time':  employee.Over_Time ,
                    'daysPaid':  employee.daysPaid ,
                    'daysLWP':  employee.daysLWP ,
                    'basic':  employee.basic ,
                    'hra':  employee.hra ,
                    'other':  employee.other,
                    'basicSalary':  employee.basicSalary,
                    'ecm_hra':  employee.ecm_hra,
                    'ecm_other': employee.ecm_other,
                    'incentive':  employee.incentive,
                    'pf':  employee.pf,
                    'esi':  employee.esi,
                    'tds':  employee.tds,
                    'total':  employee.basic + employee.hra + employee.other, 
                    'gross_salary':  employee.basicSalary + employee.ecm_hra + employee.ecm_other + employee.incentive,
                    'total_deduction': employee.pf + employee.esi + employee.tds,
                    'net_pay' : net_pay,
                    'words' : num2words(net_pay)


                } 


    pdf = render_to_pdf('generate_pdf.html',{'employee': data_ })
    return HttpResponse(pdf,content_type='application/pdf')