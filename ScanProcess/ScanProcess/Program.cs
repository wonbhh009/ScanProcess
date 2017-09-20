using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Configuration;
using System.Diagnostics;
using System.Timers;
using Timer = System.Timers.Timer;
using System.Collections.Specialized;

namespace ScanProcess
{
    class Program
    {
        public static string MogoDBPatch = ConfigurationSettings.AppSettings.Get("mongoDB");
        public static string XCouldPatch = ConfigurationSettings.AppSettings.Get("XCould");
        public static string mName = ConfigurationSettings.AppSettings.Get("mgPro");
        public static string xName = ConfigurationSettings.AppSettings.Get("xPro");
        public static string xtime = ConfigurationSettings.AppSettings.Get("xtime");
        static void Main(string[] args)
        {
           
           
            Console.Title = "进程监控";
            Console.BackgroundColor = ConsoleColor.DarkCyan;
            Console.ForegroundColor = ConsoleColor.Magenta;
            Console.Clear();
            Console.WriteLine("==================================================");
            Console.WriteLine("=                                                =");
            Console.WriteLine("   进程监控开始," + xtime + "秒扫描一次.请稍后... ");
            Console.WriteLine("=                                                =");
            Console.WriteLine("==================================================");
            Timer tmr = new Timer(Convert.ToInt32(xtime) * 1000);
            tmr.Elapsed += new System.Timers.ElapsedEventHandler(ScPro);
            tmr.AutoReset = true;
            tmr.Enabled = true;
            Console.ReadKey();
        }

        private static void ScPro(object send,ElapsedEventArgs e)
        {
            try
            {
               
                var pros = Process.GetProcesses();
                NameValueCollection nv = ConfigurationSettings.AppSettings;
                var count = CheckProc(mName);
                var count2 = CheckProc(xName);

                if (!count)
                {
                    if (count2)
                    {
                        Console.WriteLine("没有进程mongod,开始关闭XCoulud进程....{0}", DateTime.Now.ToString());
                        Thread th = new Thread(delegate() { KillPro(xName); });
                        th.Start();
                        th.IsBackground = true;
                        th.Join();
                        th.Abort();
                    }
                    Console.WriteLine("开始启动MogoDB进程....{0}", DateTime.Now.ToString());
                    if (CreatPro(MogoDBPatch))
                    {
                        Thread.Sleep(5000);
                        Console.WriteLine("MogoDB进程启动完毕....{0}", DateTime.Now.ToString());
                        if (CreatPro(XCouldPatch))
                        {
                            Thread.Sleep(5000);
                            Console.WriteLine("XCould进程启动完毕....{0}", DateTime.Now.ToString());
                        }
                        else
                        {
                            Thread.Sleep(5000);
                            Console.WriteLine("XCould进程启动失败,请手动启动.进程路径" + @XCouldPatch);
                        }
                    }
                    else
                    {
                        Thread.Sleep(5000);
                        Console.WriteLine("进程启动失败,请手动启动.进程路径" + @MogoDBPatch);
                    }

                }
                else
                {
                    Console.WriteLine("MogoDB进程运行正常......{0}", DateTime.Now.ToString());
                    if (count2)
                    {
                        Console.WriteLine("XCould进程运行正常......{0}", DateTime.Now.ToString());
                    }
                    else
                    {
                        Console.WriteLine("没有发现XCould进程,开始尝试启动XCould服务......{0}", DateTime.Now.ToString());
                        if (CreatPro(XCouldPatch))
                        {
                            Thread.Sleep(5000);
                            Console.WriteLine("XCould进程启动完毕....{0}", DateTime.Now.ToString());
                        }
                        else
                        {
                            Thread.Sleep(5000);
                            Console.WriteLine("XCould进程启动失败,请手动启动.进程路径" + @XCouldPatch);
                        }
                    }

                }
            }
            catch(Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
        }
        /// <summary>
        /// 检查进程是否存在
        /// </summary>
        /// <param name="ProName"></param>
        /// <returns></returns>
        public static bool CheckProc(string ProName)
        {
            var pros = Process.GetProcesses();
            var count = pros.Count(x => x.ProcessName.Contains(ProName));
            if (count > 0)
                return true;
            else
                return false;
        }

        /// <summary>
        /// 毙掉进程
        /// </summary>
        /// <param name="proName"></param>
        public static void KillPro(string proName)
        {
            var pros = Process.GetProcesses();
            foreach (var i in pros)
            {
                if (i.ProcessName.Contains(proName))
                {
                    i.Kill();
                }
            }
        }
        /// <summary>
        /// 启动进程
        /// </summary>
        /// <param name="proName"></param>
        /// <returns></returns>
        public static bool CreatPro(string proName)
        {
            Process pro = new Process();
            pro.StartInfo.FileName = proName;
            pro.StartInfo.UseShellExecute = true;
            pro.StartInfo.CreateNoWindow = false;
            return pro.Start();
            
        }

    }
}
