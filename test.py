import smtplib
import argparse

def send_mail():
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.starttls()
    server.login("mustafaqazi1998@gmail.com", "enterblaze")

    msg = "Hello!"

    server.sendmail("mustafaqazi1998@gmail.com", "mus.qazi999@gmail.com", msg)
    print("Success")

if '__name__' == '__main__':
    parser = argparse.ArgumentParser()
    parser.parse_args()
