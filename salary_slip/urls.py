"""salary_slip URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/3.1/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin  
from django.urls import path  
from employee import views  as emp
from salary import views  as sal
urlpatterns = [  
    path('admin/', admin.site.urls), 
    path('index', emp.index),
    path('logout', emp.logout),
    path('login', sal.login), 
    path('salary_slip', emp.salary_slip),  
    path('show',emp.show),
    # path('show1',emp.show1),
    # path('show_all',emp.show_all),  
    path('view',emp.view),
    path('edit/<int:id>', emp.edit),  
    path('update/<int:id>', emp.update),  
    path('delete/<int:id>', emp.destroy),
    path('generate_pdf/<int:id>', emp.generate_pdf),  
] 